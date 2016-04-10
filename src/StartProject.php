<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class StartProject extends Command {

    public function configure()
    {
        $this->setName('start')
            ->setDescription('Start the timer on a project.')
            ->addArgument('project', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $project = $input->getArgument('project');
        $start_time = round(time()/60)*60; // round to nearest minute

        /* @TODO
         * Query DB looking for any values of 'running' in column 'stop_time'.
         * If one is found update stop_time with current timestamp BEFORE starting the timer on the next project.
         * This will keep us to one running timer at a time.
         */

        $this->database->query('
            insert into entries (project_id, start_time) 
            values (:project, :start_time)
            ',
            compact('project','start_time')
        );

        $output->writeln('<info>Timer started!</info>');
    }

}