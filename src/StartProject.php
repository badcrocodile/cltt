<?php namespace Acme;


use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class StartProject extends Command {

    public function configure()
    {
        $this->setName('start')
            ->setDescription('Start the timer on a project.')
            ->addArgument('project', InputArgument::OPTIONAL);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        // TODO: It would be nice to add an argument allowing user to "start" a project "x" minutes ago. EX: cltt start "1 hour ago"
        $project = $input->getArgument('project');

        if($project) {
            $this->startProject($project, $output);
        } else {
            $output->writeln((new OutputMessage(" What project do you want to start? "))->asQuestion());
            $output->writeln((new OutputMessage("")));

            $this->showProjectsList($output);

            $helper = $this->getHelper('question');
            $question = new Question("\n=> ");

            $project = $helper->ask($input, $output, $question);

            // TODO: Validate that user selected a valid project ID. Look into using Symfony's ChoiceQuestion to limit available selections to only active projects
            if($project === "") {
                throw new RuntimeException('We cannot continue without an ID for the project you wish to start working on');
            }

            $this->startProject($project, $output);
        }
    }

    public function startProject($project, OutputInterface $output)
    {
        // TODO: Add method to command.php to handle converting project ID to project name. Could use in a number of locations
        $project_name = $this->database->fetchFirstRow("
                SELECT name 
                FROM projects 
                WHERE id = $project
            ", "name");

        $start_time = round(time()/60)*60; // round to nearest minute

        $this->database->query('
            insert into entries (project_id, start_time) 
            values (:project, :start_time)
            ',
            compact('project','start_time')
        );

        $output->writeln((new OutputMessage('Timer started for project "' . $project_name . '"'))->asInfo());
    }

}