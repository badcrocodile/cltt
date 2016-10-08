<?php namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AddComment extends Command {

    /**
     *
     */
    public function configure()
    {
        $this->setName('comment')
            ->setDescription('Add a comment.')
            ->addArgument('comment', InputArgument::REQUIRED);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $comment = $input->getArgument('comment');

        // Need to get and set the currently running project
        $running_timers = $this->database->fetchFirstRow("
            SELECT entries.project_id, entries.start_time, projects.id, projects.name 
            FROM entries 
            INNER JOIN projects
            ON entries.project_id = projects.id
            WHERE stop_time IS NULL
        ", "id");

        var_dump($running_timers);

        if($running_timers) {
            $this->database->query(
                "insert into comments(entry_id, comment) values(:running_timers, :comment)",
                compact('running_timers', 'comment')
            );

            $output->writeln((new OutputMessage('Comment added to project'))->asInfo());
        } else {
            $output->writeln((new OutputMessage('No timers currently running to add a comment to'))->asInfo());
        }


//        $this->showProjects($output);
    }

}
