<?php namespace Acme;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Carbon\Carbon;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class ShowTimes extends Command {

    public function configure()
    {
        $this->setName('showtimes')
             ->setDescription('Display the times logged for a project.')
             ->addArgument('project', InputArgument::REQUIRED)
             ->addOption('edit', 'e', InputOption::VALUE_REQUIRED, 'Edit a time entry', null);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $project_id = $input->getArgument('project');

        $edit_entry = $input->getOption('edit');

        $this->editTimeEntry($input, $output, $edit_entry);

        $sessions = $this->database->selectWhere("
            SELECT id, project_id, start_time, stop_time 
            FROM entries 
            WHERE project_id = $project_id 
            ORDER BY start_time ASC
        ");

        $session  = new Session($sessions);

        $project_total = $session->formatProjectTotal();

        $project_name  = $this->database->fetchFirstRow("
            SELECT name 
            FROM projects 
            WHERE id = $project_id 
            LIMIT 1"
            , "name"
        );

        $table = new Table($output);

        $table_headers[] = [new TableCell("<comment>Project: $project_name</comment>", ['colspan' => 5])];
        $table_headers[] = ['ID', 'Date', 'Start Time', 'Stop Time', 'Session Length'];

        $table_rows   = $session->getSessionTimes();
        $table_rows[] = new TableSeparator();
        $table_rows[] = [new TableCell("<comment>Total:</comment>", array('colspan' => 4)), new TableCell("<comment>$project_total</comment>", ['colspan' => 1])];

        $table->setHeaders($table_headers)->setRows($table_rows)->render();
    }

    /**
     * Edit one of the time entries
     * 
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param $time_entry_id
     */
    private function editTimeEntry(InputInterface $input, OutputInterface $output, $time_entry_id) {
        if(isset($time_entry_id)) {
            $edit_row            = $this->database->selectWhere('SELECT start_time, stop_time FROM entries WHERE id = ' . $time_entry_id);
            $edit_row_date       = Carbon::createFromTimestamp($edit_row[0]['start_time'])->toFormattedDateString();
            $edit_row_start_time = Carbon::createFromTimestamp($edit_row[0]['start_time'])->format('h:i a');
            $edit_row_stop_time  = Carbon::createFromTimestamp($edit_row[0]['stop_time'])->format('h:i a');
            $helper              = $this->getHelper('question');

            $edit_start_or_stop = new ChoiceQuestion(
                '<info>Editing times entered on ' . $edit_row_date . PHP_EOL . 'Edit Stop Time or Start Time? (Defaults to Stop Time)</info>',
                array('Start Time', 'Stop Time'),
                1
            );

            $edit_start_or_stop->setErrorMessage('Not a valid selection bro');

            $edit_column = $helper->ask($input, $output, $edit_start_or_stop);

            $enter_new_time = new Question('Enter new time: ', '5:00 pm');

            $new_time = $helper->ask($input, $output, $enter_new_time);

            $output->writeln("\n<info>$edit_column will be set to $new_time</info>\n");

            $new_time_entry = Carbon::createFromFormat('M j, Y h:i a', $edit_row_date . " " . $new_time)->timestamp;

            var_dump($new_time_entry);

            if($edit_column == "Start Time") {
                $this->database->query('
                    UPDATE entries 
                    SET start_time = :new_time_entry 
                    WHERE id = :time_entry_id',
                    compact('new_time_entry', 'time_entry_id')
                );
            } else {
                $this->database->query('
                    UPDATE entries 
                    SET stop_time = :new_time_entry 
                    WHERE id = :time_entry_id',
                    compact('new_time_entry', 'time_entry_id')
                );
            }

            exit();
        }
    }
}