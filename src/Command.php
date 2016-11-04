<?php namespace Acme;


use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand {

    protected $database;

    /**
     * Command constructor.
     * @param \Acme\DatabaseAdapter $database
     */
    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return mixed
     */
    protected function showProjectsTable(OutputInterface $output) {
        if (!$projects = $this->database->fetchAll('projects')) {
            return $output->writeln('<info>No projects at the moment!</info>');
        }

        $table = new Table($output);

        $table->setHeaders(['ID', 'Name'])->setRows($projects)->render();
    }

    protected function showProjectsList(OutputInterface $output) {
        if (!$projects = $this->database->fetchAll('projects')) {
            return $output->writeln('<error>No projects at the moment. Perhaps you\'d like to create one?</error>');
        }

        $formatter = $this->getHelper('formatter');

        foreach ($projects as $id => $project) {
            $formatted_line = $formatter->formatSection(
                $project['id'], $project['name']
            );

            $output->writeln($formatted_line);
        }
    }
}