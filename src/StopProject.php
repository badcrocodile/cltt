<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class StopProject extends Command
{
    public function configure()
    {
        $this->setName('stop')
            ->setDescription('Stop the timer on a project.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        /* @TODO
         * Let me run multiple projects at the same time.
         */

        $stopTime = round(time()/60)*60; // round to nearest minute

        $this->database->query(
            'UPDATE entries SET stop_time = :stopTime WHERE stop_time is null',
            compact('stopTime')
        );

        $output->writeln('<info>Timer stopped!</info>');
    }

}