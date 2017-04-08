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
             ->addArgument('id', InputArgument::OPTIONAL);
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

    public function archiveProject($id, OutputInterface $output)
    {
        $this->database->query('delete from projects where id = :id', compact('id'));

        $output->writeln('<info>Project archived!</info>');

        $this->showProjectsTable($output);
    }
}