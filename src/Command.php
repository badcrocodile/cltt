<?php namespace Acme;


use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class Command extends SymfonyCommand {

    protected $database;

    /**
     * Command constructor.
     *
     * @param \Acme\DatabaseAdapter $database
     */
    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    /**
     * Output active projects in table format
     *
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return mixed
     */
    protected function showProjectsTable(OutputInterface $output) {
        if (!$projects = $this->database->fetchActiveProjects()) {
            return $output->writeln('<info>No projects at the moment!</info>');
        }

        $table = new Table($output);

        $table->setHeaders(['ID', 'Name'])->setRows($projects)->render();
    }

    /**
     * Output active projects in list format
     *
     * @param OutputInterface $output
     *
     * @return mixed
     */
    protected function showProjectsList(OutputInterface $output) {
        if (!$projects = $this->database->fetchActiveProjects()) {
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

    /**
     * Outputs archived projects in table format
     *
     * @param OutputInterface $output
     *
     * @return mixed
     */
    protected function showArchivedProjectsTable(OutputInterface $output)
    {
        if (!$projects = $this->database->fetchArchivedProjects()) {
            return $output->writeln('<info>No archived projects found.</info>');
        }

        $table = new Table($output);

        $table->setHeaders(['ID', 'Name'])->setRows($projects)->render();
    }

    /**
     * Outputs archived projects in list format
     *
     * @param OutputInterface $output
     *
     * @return mixed
     */
    protected function showArchivedProjectsList(OutputInterface $output) {
        if (!$projects = $this->database->fetchArchivedProjects()) {
            return $output->writeln('<error>No archived projects found.</error>');
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