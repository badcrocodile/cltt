<?php namespace Cltt;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AddComment extends Command {

    public function configure()
    {
        $this->setName('comment')
            ->setDescription('Add a comment to a running timer.')
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
        $attach_comment_to = $this->database->fetchFirstRow("
            SELECT id 
            FROM entries 
            WHERE stop_time IS NULL
        ", "id");

        if($attach_comment_to) {
            $this->database->query(
                "insert into comments(entry_id, comment) values(:attach_comment_to, :comment)",
                compact('attach_comment_to', 'comment')
            );

            $output->writeln((new OutputMessage('Comment added to project'))->asInfo());
        }
        else {
            $output->writeln((new OutputMessage(' No timers running to add a comment to ¯\_(ツ)_/¯ '))->asError());
        }
    }
}
