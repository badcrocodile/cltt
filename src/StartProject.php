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
            ->setDescription('Begin timing a project. Accepts a second argument of time-ago to adjust for situations where you forget to start your timer.')
            ->addArgument('project', InputArgument::OPTIONAL)
            ->addArgument('time_adjustment', InputArgument::OPTIONAL);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $project = $input->getArgument('project');

        $time_adjustment = $this->getTimeAdjustment($input);

        if($project) {
            $this->startProject($project, $output, $time_adjustment);
        } else {
            $output->writeln((new OutputMessage(" What project do you want to start? "))->asQuestion());
            $output->writeln((new OutputMessage("")));

            $this->showProjectsList($output);

            $helper = $this->getHelper('question');
            $question = new Question("\nProject ID => ");

            $project = $helper->ask($input, $output, $question);

            // TODO: Validate that user selected a valid project ID. Look into using Symfony's ChoiceQuestion to limit available selections to only active projects
            if($project === "") {
                throw new RuntimeException('We cannot continue without an ID for the project you wish to start working on');
            }

            $this->startProject($project, $output, $time_adjustment);
        }
    }

    public function startProject($project, OutputInterface $output, $time_adjustment = null)
    {
        $project_name = $this->database->projectIDtoName($project);

        if(isset($time_adjustment)) {
            $start_time = round(strtotime($time_adjustment)/60)*60;
        } else {
            $start_time = round(time()/60)*60;
        }

        $this->database->query('
            insert into entries (project_id, start_time) 
            values (:project, :start_time)
            ',
            compact('project','start_time')
        );

        $output->writeln((new OutputMessage(''))->asInfo());
        $output->writeln((new OutputMessage('Timer started for project "' . $project_name . '"'))->asInfo());
    }

    /**
     * Determines status of time_adjustment argument
     *
     * @param InputInterface $input
     *
     * @return string|bool
     */
    private function getTimeAdjustment(InputInterface $input)
    {
        $time_adjustment = $input->getArgument('time_adjustment');

        if($time_adjustment) {
            return $input->getArgument('time_adjustment');
        }

        return null;
    }

}