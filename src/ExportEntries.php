<?php namespace Acme;

use Carbon\Carbon;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ExportEntries extends Command {
    public function configure()
    {
        $this->setName('export')
            ->setDescription('Export time entries to csv.')
            ->addArgument('week', InputArgument::OPTIONAL);
    }

    /**
     * TODO: Should be more of a calendar format, like Klok.
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $week             = $input->getArgument('week');
        $date_week        = (isset($week) ? new Carbon($week) : new Carbon());
        $date_week_start  = (new Carbon($date_week))->startOfWeek()->timestamp;
        $date_week_end    = (new Carbon($date_week))->endOfWeek()->timestamp;

        $start_of_week    = (new Carbon($date_week))->startOfWeek();

        // Why can't I ->timestamp addDay()'s?
        $monday_start = (new Carbon($start_of_week));
        $monday_stop  = (new Carbon($monday_start))->endOfDay();
        $tuesday_start = (new Carbon($monday_start))->addDay();
        $tuesday_stop  = (new Carbon($tuesday_start))->endOfDay();
        $wednesday_start = (new Carbon($tuesday_start))->addDay();
        $wednesday_stop  = (new Carbon($wednesday_start))->endOfDay();
        $thursday_start  = (new Carbon($wednesday_start))->addDay();
        $thursday_stop   = (new Carbon($thursday_start))->endOfDay();
        $friday_start    = (new Carbon($thursday_start))->addDay();
        $friday_stop     = (new Carbon($friday_start))->endOfDay();
        $saturday_start  = (new Carbon($friday_start))->addDay();
        $saturday_stop   = (new Carbon($saturday_start))->endOfDay();
        $sunday_start    = (new Carbon($saturday_start))->addDay();
        $sunday_stop     = (new Carbon($sunday_start))->endOfDay();
        echo "To timestamp: " . $tuesday_start->timestamp . "\n\n";
        echo "To timestamp: " . $tuesday_stop->timestamp . "\n\n";
        echo "To timestamp: " . $thursday_start->timestamp . "\n\n";

//        $header_row['project']    = "";
//        // FYI, Monday returns 1, Sunday returns 0
//        $header_row['monday']     = $start_of_week->format('D m/d/y');
//        $header_row['tuesday']    = $start_of_week->addDay()->format('D m/d/y');
//        $header_row['wednesday']  = $start_of_week->addDay()->format('D m/d/y');
//        $header_row['thursday']   = $start_of_week->addDay()->format('D m/d/y');
//        $header_row['friday']     = $start_of_week->addDay()->format('D m/d/y');
//        $header_row['saturday']   = $start_of_week->addDay()->format('D m/d/y');
//        $header_row['sunday']     = $start_of_week->addDay()->format('D m/d/y');
//
//        var_dump($header_row);

        /**
         * foreach day of the week
         * get all projects worked on
         * get all time entries for those projects
         * add those time entries together
         * add all time entries for that day together
         *
         * foreach day of the week
         * get all projects worked on
         * foreach project worked on
         * add up the hours
         *
         * [monday]
         *      [project 1] => [total time]
         *      [project 2] => [total time]
         *      [project 3] => [total time]
         * [tuesday]
         *      [project 1] => [total time]
         *      [project 2] => [total time]
         * [wednesday]
         *      [project 1] => [total time]
         */

        $monday_sessions = $this->database->selectWhere("
            SELECT project_id, start_time, stop_time, name
            FROM entries
            JOIN projects
            ON entries.project_id = projects.id
            WHERE stop_time
            BETWEEN $monday_start->timestamp AND $monday_stop->timestamp
        ");

        var_dump($monday_sessions);

        $sessions = $this->database->selectWhere("
            SELECT entries.id, project_id, start_time, stop_time, name
            FROM entries
            JOIN projects
            ON entries.project_id = projects.id
            WHERE stop_time 
            BETWEEN $date_week_start AND $date_week_end
        ");

        $session = new Session($sessions);

        $session_rows = $session->getSessionTimesWithProjectName();

//        var_dump($session);

        $project_total = $session->formatProjectTotal();

//        $csv = new CsvResponse($session_rows, 200, array('Project', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Duration'));
    }
}