<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class NewProject extends Command {

    /**
     *
     */
    public function configure()
    {
        $this->setName('new')
            ->setDescription('Create a new project.')
            ->addArgument('project', InputArgument::OPTIONAL);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $project = $input->getArgument('project');

        if($project) {
            $this->database->query(
                'insert into projects(name) values(:project)',
                compact('project')
            );

            $output->writeln((new OutputMessage(' Project created '))->asInfo());

            $this->showProjectsTable($output);
        } else {
            $helper = $this->getHelper('question');
            $question = new Question("New project name: ", 'New Project');

            $project = $helper->ask($input, $output, $question);

            $this->database->query(
                'insert into projects(name) values(:project)',
                compact('project')
            );

            $output->writeln((new OutputMessage('Project added'))->asInfo());

            $this->showProjectsTable($output);
        }
    }
}