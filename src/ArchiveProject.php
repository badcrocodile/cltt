<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class ArchiveProject extends Command
{
    public function configure()
    {
        $this->setName('archive')
             ->setDescription('Archive a project by its ID.')
             ->setHelp('The archive command allows you archive a project. After archiving the project will no longer be visible in your list of available projects.')
             ->addUsage('')
             ->addArgument('id', InputArgument::OPTIONAL, 'The ID of the project to archive');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        if($id) {
            $this->archiveProject($id, $output);
        } else {
            $output->writeln((new OutputMessage("Archive which project? "))->asInfo());

            $this->showProjectsList($output);

            $helper = $this->getHelper('question');

            $question = new Question("\n=> ", '1');

            $id = $helper->ask($input, $output, $question);

            $this->archiveProject($id, $output);
        }
    }

    /**
     * Handles archiving of projects
     * Which basically means setting the archived flag to 1 on the projects table
     *
     * @param                 $id
     * @param OutputInterface $output
     */
    public function archiveProject($id, OutputInterface $output)
    {
        // TODO: Check for running timers before archiving the project
        /**
         * Before we archive a project we should stop any running timers for it
         */

//        $this->database->query('delete from projects where id = :id', compact('id'));
        $archived = 1;

        $this->database->query('
            UPDATE projects 
            SET archived = :archived 
            WHERE id = :id',
            compact('archived', 'id')
        );
    }
}