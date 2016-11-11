<?php namespace Acme;

use Carbon\Carbon;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
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

        $projects = $this->database->fetchAll('projects');

        $days_of_week['monday']['start']       = (new Carbon($start_of_week));
        $days_of_week['monday']['stop']        = (new Carbon($days_of_week['monday']['start']))->endOfDay();
        $days_of_week['tuesday']['start']      = (new Carbon($days_of_week['monday']['start']))->addDay();
        $days_of_week['tuesday']['stop']       = (new Carbon($days_of_week['tuesday']['start']))->endOfDay();
        $days_of_week['wednesday']['start']    = (new Carbon($days_of_week['tuesday']['start']))->addDay();
        $days_of_week['wednesday']['stop']     = (new Carbon($days_of_week['wednesday']['start']))->endOfDay();
        $days_of_week['thursday']['start']     = (new Carbon($days_of_week['wednesday']['start']))->addDay();
        $days_of_week['thursday']['stop']      = (new Carbon($days_of_week['thursday']['start']))->endOfDay();
        $days_of_week['friday']['start']       = (new Carbon($days_of_week['thursday']['start']))->addDay();
        $days_of_week['friday']['stop']        = (new Carbon($days_of_week['friday']['start']))->endOfDay();
        $days_of_week['saturday']['start']     = (new Carbon($days_of_week['friday']['start']))->addDay();
        $days_of_week['saturday']['stop']      = (new Carbon($days_of_week['saturday']['start']))->endOfDay();
        $days_of_week['sunday']['start']       = (new Carbon($days_of_week['saturday']['start']))->addDay();
        $days_of_week['sunday']['stop']        = (new Carbon($days_of_week['sunday']['start']))->endOfDay();

//        foreach ($projects as $project) {
//            $project_entries = new Project;
//            $project_entries->getProjectsForWeek($project, $week);
//        }

        $header_row['project'] = "Project";

        $project_week_total = [];
        $project_session_length = [];

        // csv array = [project name, monday hours, tuesday hours, wednesday hours, thursday hours, friday hours, saturday hours, sunday hours]
        // array = ("project name", "monday hours", "tuesday hours", "wednesday hours");
        $csv_array = [];
        $x = 0;

        $entries = $this->database->selectWhere('
            SELECT id, start_time, stop_time
            FROM entries
            WHERE 1=1
        ');

        /**
         * TODO Just make a new query to get the total time for a week of any given project.
         * TODO and a new query for comments (duh)
         */


        foreach($entries as $entry) {
            $start_time = (int)$entry['start_time'];
            $stop_time = (int)$entry['stop_time'];
            $session_length = ((int)$stop_time - (int)$start_time);
            $id = $entry['id'];
            $this->database->query('
                UPDATE entries
                SET session_length = :session_length
                WHERE id = :id',
                compact('session_length', 'id')
            );
        }

        $this->database->query('
            UPDATE entries 
            SET session_length = :stop_timestamp, session_length = :session_length
            WHERE stop_time IS NULL',
            compact('stop_timestamp', 'session_length')
        );

        foreach ($projects as $project) {
            $csv_array[$x]['project_name'] = $project['name'];

            foreach ($days_of_week as $day_of_week => $day_delimiter) {
                $header_row[$day_of_week] = $day_delimiter['start']->format('D m/d/y');

                $sessions[$x][$day_of_week] = $this->database->selectWhere("
                    SELECT session_length, name
                    FROM entries
                    JOIN projects
                    ON entries.project_id = projects.id
                    WHERE stop_time
                    BETWEEN " . $day_delimiter['start']->timestamp . "
                    AND " . $day_delimiter['stop']->timestamp . "
                    AND projects.name = '" . $project['name'] . "'"
                );
            }

            foreach($sessions as $session => $entries) {

                $project_week_total[$x] = 0;

                foreach($entries as $day => $entry) {
//                    $project_week_total[$x] += $entry[]['session_length'];
                    $project_session_length[$x] = 0;
                    var_dump($entry);

                    // Need to get weekly totals
                    if(empty($entry)) {
                            $project_session_length[$x] += 0;
                            $csv_array[$x][$day] = "--";
                    } else {
                        foreach($entry as $item) {
                            $project_session_length[$x] += $item['session_length'];
                            $csv_array[$x][$day] = FormatTime::formatTotal($project_session_length[$x]);
                        }
                    }
                }
//                var_dump($entries);
//                var_dump($project_week_total);
            }
            $x++;
        }

//        $header_row['total'] = "Total Hours";

        $csv_row[0] = $header_row;

        $x = 0;
        foreach($csv_array as $item) {
            $x++;
            $csv_row[$x] = $item;
        }

        $fp = fopen('file.csv', 'w');

        foreach ($csv_row as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);

    }
}
