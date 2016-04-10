<?php namespace Acme;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Carbon\Carbon;

class ShowWeek extends ShowDates {

    public function configure()
    {
        $this->setName('week')
             ->setDescription('Display times logged during a specific week.')
             ->addArgument('week', InputArgument::OPTIONAL);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        /*
         * I'd prefer start of week be Saturday and end of week be Sunday but that seems
         * to break with international norms and is not how Carbon handles things.
         * Start of week is Monday. End of week is Sunday. That's how it is yo.
         * https://github.com/briannesbitt/Carbon/issues/175
         */
        $week = $input->getArgument('week');

        $date_day   = (isset($week) ? new Carbon($week) : new Carbon());
        $date_start = (new Carbon($date_day))->startOfWeek()->timestamp;
        $date_end   = (new Carbon($date_day))->endOfWeek()->timestamp;

        $sessions = $this->database->selectWhere("
            SELECT start_time, stop_time, project_id 
            FROM entries 
            WHERE stop_time 
            BETWEEN $date_start AND $date_end
        ");
        var_dump($sessions);

        $session = new Session($sessions);

        $table = new Table($output);

        $project_totals = $session->formatProjectTotal();

        echo "Project totals: \n";
        var_dump($project_totals);

        $output->writeln("<comment>Total time for the week of " . (new Carbon($date_day))->startOfWeek()->toFormattedDateString() . " - " . (new Carbon($date_day))->endOfWeek()->toFormattedDateString() . ": </comment>");

        $table_headers[] = [new TableCell("<comment>Total for week: </comment>", ['colspan' => 4])];

        $table->setHeaders(['Date', 'Start', 'Stop', 'Total'])->setRows($session->getSessionTimes())->render();

    }
}