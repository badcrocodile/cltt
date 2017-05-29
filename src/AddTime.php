<?php namespace Acme;


use Carbon\Carbon;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class AddTime extends Command
{
    public $project;
    public $date;
    public $start_time;
    public $stop_time;

    public function configure()
    {
        /**
         * All arguments are optional
         * User will be prompted for missing arguments if not provided
         */
        $this->setName('add-time')
             ->setDescription('Manually insert a time entry.')
             ->setHelp('Manually insert a time entry. Run the command and follow the prompts.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->project = $this->getProjectID($input, $output);
        $this->date = $this->getDate($input, $output);
        $this->start_time = $this->getStartTime($input, $output);
        $this->stop_time = $this->getStopTime($input, $output);

        if($this->project && $this->date && $this->start_time && $this->stop_time) {
            $this->addEntry($input, $output);
        } else {
            $output->writeln((new OutputMessage('Improper values provided for one or more arguments.'))->asError());
        }
    }

    private function getProjectID(InputInterface $input, OutputInterface $output)
    {
        $output->writeln((new OutputMessage("Adding a new time entry"))->asInfo());
        $output->writeln((new OutputMessage("")));

        $this->showProjectsList($output);

        $helper = $this->getHelper('question');
        $question = new Question("\nProject ID \n=> ");

        return $project = $helper->ask($input, $output, $question);
    }

    private function getDate(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new Question("\nDate (MM/DD/YYYY) or keywords (today, yesterday, last week, last monday, etc)\n => ");

        return $date = $helper->ask($input, $output, $question);
    }

    private function getStartTime(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new Question("\nStart time (2:45pm, 2pm) \n=> ");

        return $start_time = $helper->ask($input, $output, $question);
    }

    private function getStopTime(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new Question("\nStop time (3:45pm, 3pm) \n=> ");

        return $stop_time = $helper->ask($input, $output, $question);
    }

    private function addEntry(InputInterface $input, OutputInterface $output)
    {
        $project = $this->project;
        $project_name = $this->database->projectIDtoName($project);

        $entry_start_time = strtotime($this->date . " " . $this->start_time);
        $entry_stop_time = strtotime($this->date . " " . $this->stop_time);

        $start_time = Carbon::createFromTimestamp($entry_start_time);
        $stop_time = Carbon::createFromTimestamp($entry_stop_time);

        $session_length = $stop_time->timestamp - $start_time->timestamp;

        if($start_time < $stop_time) {
            // Insert start time
            $this->database->query('
                INSERT INTO entries (project_id, start_time) 
                VALUES (:project, :entry_start_time)',
                compact('project','entry_start_time')
            );

            $last_inserted_row = $this->database->lastInsertedRowID();

            // Insert stop time
            // Need to get the ID of the last row inserted from above
            $this->database->query('
                UPDATE entries
                SET stop_time = :entry_stop_time, session_length = :session_length
                WHERE id = :last_inserted_row',
                compact('entry_stop_time', 'session_length', 'last_inserted_row')
            );

            $output->writeln('');
            $output->writeln((new OutputMessage('New time recorded on ' . date('m/d/Y', $start_time->timestamp) . ' from ' . date('g:ia', $start_time->timestamp) . ' to ' . date('g:ia', $stop_time->timestamp) . ' for project ' . $project . ' (' . $project_name . ').'))->asInfo());
        } else {
            $output->writeln((new OutputMessage('Stop time cannot come before start time :(. This is not how the world works.'))->asError());
        }
    }

}