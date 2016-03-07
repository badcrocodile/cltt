<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AddProject extends Command
{
    public function configure()
    {
        $this->setName('add')
            ->setDescription('Add a project.')
            ->addArgument('project', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $project = $input->getArgument('project');

        $this->database->query(
            'insert into projects(name) values(:project)',
            compact('project')
        );

        $output->writeln('<info>Project Added!</info>');

        $this->showProjects($output);
    }

}