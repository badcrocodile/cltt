<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteTime extends Command {

    public function configure()
    {
        $this->setName('delete-time')
            ->setDescription('Delete an existing time entry by ID.')
            ->addArgument('timeID', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $timeID = $input->getArgument('timeID');

        $this->database->query('DELETE FROM entries WHERE id = :timeID', compact('timeID'));

        // Also delete comments
        $this->database->query('DELETE FROM comments WHERE entry_id = :timeID', compact('timeID'));

        $output->writeln('<info>Entry deleted!</info>');

    }
}