<?php namespace Acme;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunningTimers extends Command {

    public function configure()
    {
        $this->setName('running')
             ->setAliases(['status'])
             ->setDescription('Shows all running timers');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output) 
    {
        // TODO: Extract functionality of checking for running timers into it's own class. We can use this in other places
        $running_timers = $this->database->fetchFirstRow("
            SELECT entries.project_id, entries.start_time, projects.id, projects.name 
            FROM entries 
            INNER JOIN projects
            ON entries.project_id = projects.id
            WHERE stop_time IS NULL
        ", "name");

        $running_start_time = $this->database->fetchFirstRow("
            SELECT entries.project_id, entries.start_time, projects.id, projects.name 
            FROM entries 
            INNER JOIN projects
            ON entries.project_id = projects.id
            WHERE stop_time IS NULL
        ", "start_time");

        $elapsed_time = FormatTime::formatTotal(FormatTime::getElapsedTime($running_start_time));

        if($running_timers) {
            $output->writeln((new OutputMessage("You've been working on $running_timers for $elapsed_time"))->asInfo());
        } else {
            $output->writeln((new OutputMessage('No timers currently running'))->asInfo());
        }
    }

}