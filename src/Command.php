<?php namespace Acme;


use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand {

    protected $database;

    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    protected function showProjects(OutputInterface $output) {
        if (!$projects = $this->database->fetchAll('projects')) {
            return $output->writeln('<info>No projects at the moment!</info>');
        }

        $table = new Table($output);

        $table->setHeaders(['id', 'name'])->setRows($projects)->render();
    }
}