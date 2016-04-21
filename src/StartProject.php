<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class StartProject extends Command {

    public function configure()
    {
        $this->setName('start')
            ->setDescription('Start the timer on a project.')
            ->addArgument('project', InputArgument::REQUIRED);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $project = $input->getArgument('project');
        $start_time = round(time()/60)*60; // round to nearest minute

        $this->database->query('
            insert into entries (project_id, start_time) 
            values (:project, :start_time)
            ',
            compact('project','start_time')
        );

        $output->writeln((new OutputMessage('Timer started!'))->asInfo());
    }

}