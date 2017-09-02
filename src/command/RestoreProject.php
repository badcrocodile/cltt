<?php namespace Cltt;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class RestoreProject extends Command
{
    public function configure()
    {
        $this->setName('restore')
            ->setDescription('Restore a project from the archives.')
            ->setHelp('Restore a previously archived project.')
            ->addUsage('')
            ->addArgument('id', InputArgument::OPTIONAL, 'The ID of the project to restore');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        if($id) {
            $this->restoreProject($id, $output);
        } else {
            $output->writeln((new OutputMessage("Restore which project? "))->asInfo());

            $this->showArchivedProjectsList($output);

            $helper = $this->getHelper('question');

            $question = new Question("\n=> ", '1');

            $id = $helper->ask($input, $output, $question);

            $this->restoreProject($id, $output);
        }
    }

    /**
     * Handles archiving of projects
     * Which basically means setting the archived flag to 1 on the projects table
     *
     * @param                 $id
     * @param OutputInterface $output
     */
    public function restoreProject($id, OutputInterface $output)
    {
//        $this->database->query('delete from projects where id = :id', compact('id'));
        $archived = NULL;

        $this->database->query('
            UPDATE projects 
            SET archived = :archived 
            WHERE id = :id',
            compact('archived', 'id')
        );

        $output->writeln((new OutputMessage("\nProject $id restored!\n "))->asInfo());

        $this->showProjectsTable($output);
    }

}