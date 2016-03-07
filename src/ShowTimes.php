<?php namespace Acme;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Carbon\Carbon;

class ShowTimes extends Command
{
    /**
     *
     */
    public function configure()
    {
        $this->setName('showtimes')
             ->setDescription('Display the times logged for a project.')
             ->addArgument('project', InputArgument::REQUIRED);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        // get all times logged for project_id
        // options or flags will determine output (day, week, month)
        // default will be current week?

        $project = $input->getArgument('project');

        $times = $this->database->selectWhere("SELECT start_time, stop_time FROM entries WHERE project_id = $project ORDER BY start_time ASC");

        $session = ComputeTime::compute_session_length($times);

        $project_total_seconds = ComputeTime::compute_project_total_seconds($times);

        $project_total_formatted = FormatTime::format_project_total($project_total_seconds);

        $table = new Table($output);

        $table->setHeaders(['Date', 'Start Time', 'Stop Time', 'Total'])->setRows($session)->render();

        $output->writeln("<info>Project Totals: $project_total_formatted</info>");

    }

}