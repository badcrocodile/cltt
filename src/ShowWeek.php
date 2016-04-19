<?php namespace Acme;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
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
            SELECT id, project_id, start_time, stop_time 
            FROM entries 
            WHERE stop_time 
            BETWEEN $date_start AND $date_end
        ");
        var_dump($sessions);

        $session = new Session($sessions);

        $table = new Table($output);

        $project_total = $session->formatProjectTotal();

        $table_header_message = "<comment>Time entries for the week of " . (new Carbon($date_day))->startOfWeek()->toFormattedDateString() . " - " . (new Carbon($date_day))->endOfWeek()->toFormattedDateString() . ": </comment>";

        $table_headers[] = [new TableCell($table_header_message, ['colspan' => 5])];
        $table_headers[] = ['ID', 'Date', 'Start Time', 'Stop Time', 'Session Length'];

        $table_rows   = $session->getSessionTimes();
        $table_rows[] = new TableSeparator();
        $table_rows[] = [new TableCell("<comment>Total:</comment>", array('colspan' => 4)), new TableCell("<comment>$project_total</comment>", ['colspan' => 1])];

        $table->setHeaders($table_headers)->setRows($session->getSessionTimes())->render();

    }
}