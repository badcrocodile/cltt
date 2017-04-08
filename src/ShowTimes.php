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
    // TODO: table should have days as headers to be more like a calendar.

    public function configure()
    {
        $this->setName('times')
             ->setDescription('Display the times logged for a project.')
             ->addArgument('project', InputArgument::OPTIONAL);
//             ->addOption('edit', 'e', InputOption::VALUE_REQUIRED, 'Edit a time entry', null);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $project_id = $input->getArgument('project');

        if($project_id) {
            $this->showTimes($project_id, $output);
        } else {
            $output->writeln((new OutputMessage("Show times for what project? "))->asInfo());

            $this->showProjectsList($output);

            $helper = $this->getHelper('question');

            $question = new Question("\n=> ", '1');

            $project_id = $helper->ask($input, $output, $question);

            $this->showTimes($project_id, $output);
        }
    }

    public function showTimes($project_id, $output)
    {
        $sessions = $this->database->selectWhere("
            SELECT id, project_id, start_time, stop_time 
            FROM entries 
            WHERE project_id = $project_id 
            ORDER BY start_time ASC
        ");

        // Handle currently running timers
        foreach ($sessions as $key=>$value) {
            if(is_null($sessions[$key]['stop_time'])) {
                $sessions[$key]['stop_time'] = time();
            }
        }


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
}