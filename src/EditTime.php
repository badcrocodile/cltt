<?php namespace Acme;


use Carbon\Carbon;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class EditTime extends Command {

    public function configure()
    {
        $this->setName('edit-time')
            ->setDescription('Edit an existing time entry by ID.')
            ->addArgument('timeID', InputArgument::REQUIRED);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $time_ID             = $input->getArgument('timeID');
        $edit_row            = $this->database->selectWhere('SELECT start_time, stop_time FROM entries WHERE id = ' . $time_ID);
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

        $new_time_entry = Carbon::createFromFormat('M j, Y h:i a', $edit_row_date . " " . $new_time)->timestamp;
        var_dump($new_time_entry);

        $output->writeln((new OutputMessage("\n$edit_column will be set to $new_time\n"))->asInfo());

        if($edit_column == "Start Time") {
            $this->database->query('
                    UPDATE entries 
                    SET start_time = :new_time_entry 
                    WHERE id = :time_ID',
                compact('new_time_entry', 'time_ID')
            );
        } else {
            $this->database->query('
                    UPDATE entries 
                    SET stop_time = :new_time_entry 
                    WHERE id = :time_ID',
                compact('new_time_entry', 'time_ID')
            );
        }
    }

}