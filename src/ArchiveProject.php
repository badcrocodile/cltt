<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ArchiveProject extends Command
{
    public function configure()
    {
        $this->setName('archive')
            ->setDescription('Archive a project by its ID.')
            ->addArgument('id', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query('delete from projects where id = :id', compact('id'));

        $output->writeln('<info>Project archived!</info>');

        $this->showProjects($output);

    }

}