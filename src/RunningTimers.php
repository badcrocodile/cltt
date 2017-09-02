<?php namespace Acme;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunningTimers extends Command {
    // TODO: Account for active timers

    public function configure()
    {
        $this->setName('running')
             ->setAliases(['status'])
             ->setDescription('Shows all running timers');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output) 
    {
        $running_timer_name = $this->database->getRunningTimerName();

        $running_timer_start_time = $this->database->getRunningTimerStartTime();

        $elapsed_time = FormatTime::formatTotal(FormatTime::getElapsedTime($running_timer_start_time));

        $comments = $this->database->fetchCurrentTimerComments();

        if($running_timer_name) {
            $output->writeln((new OutputMessage("You've been working on $running_timer_name for $elapsed_time"))->asInfo());

            if($comments) {
                $output->writeln((new OutputMessage(""))->asInfo());
                $output->writeln((new OutputMessage("Comments: "))->asInfo());

                foreach( $comments as $comment ) {
                    $output->writeln((new OutputMessage("- " . $comment['comment']))->asComment());
                }
            }
        } else {
            $output->writeln((new OutputMessage('No timers currently running'))->asInfo());
        }
    }

}