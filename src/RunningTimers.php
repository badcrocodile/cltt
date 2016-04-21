<?php namespace Acme;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunningTimers extends Command {

    public function configure()
    {
        $this->setName('running')
             ->setDescription('Shows all running timers');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output) 
    {
        $running_timers = $this->database->fetchFirstRow("
            SELECT entries.project_id, entries.start_time, projects.id, projects.name 
            FROM entries 
            INNER JOIN projects
            ON entries.project_id = projects.id
            WHERE stop_time IS NULL
        ", "name");

        if($running_timers) {
            $output->writeln((new OutputMessage($running_timers))->asInfo());
        } else {
            $output->writeln((new OutputMessage('No timers currently running'))->asInfo());
        }
    }

}