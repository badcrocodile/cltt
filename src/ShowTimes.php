<?php namespace Acme;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Carbon\Carbon;

class ShowTimes extends Command {

    public function configure()
    {
        $this->setName('showtimes')
             ->setDescription('Display the times logged for a project.')
             ->addArgument('project', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $project_id = $input->getArgument('project');

        $sessions = $this->database->selectWhere("SELECT project_id, start_time, stop_time FROM entries WHERE project_id = $project_id ORDER BY start_time ASC");

        $project_name = $this->database->fetchFirstRow("SELECT name FROM projects WHERE id = $project_id LIMIT 1", "name");

        $session = new Session($sessions);

        $table = new Table($output);

        $project_total = $session->formatProjectTotal();

        $output->writeln("<comment>Total time for project $project_name: $project_total</comment>");

        $table->setHeaders(['Date', 'Start Time', 'Stop Time', 'Session Length'])->setRows($session->getSessionTimes())->render();
    }
}