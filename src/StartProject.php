<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
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
        $project = $input->getArgument('project');

        if($project) {
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

        else {
            $output->writeln((new OutputMessage(" What project do you want to start? "))->asQuestion());
            $output->writeln((new OutputMessage("")));

            $this->showProjectsList($output);

            $helper = $this->getHelper('question');
            $question = new Question("\n=> ", 'Project');

            $project = $helper->ask($input, $output, $question);

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

}