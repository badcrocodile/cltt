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
     * TODO: Should be more of a calendar format.
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output) {
        $week = $input->getArgument('week');
        $date_week = (isset($week) ? new Carbon($week) : new Carbon());
        $date_week_start = (new Carbon($date_week))->startOfWeek()->timestamp;
        $date_week_end = (new Carbon($date_week))->endOfWeek()->timestamp;
        $start_of_week = (new Carbon($date_week))->startOfWeek();

        $projects = $this->database->fetchAll('projects');

        $days_of_week['monday']['start']    = (new Carbon($start_of_week));
        $days_of_week['monday']['stop']     = (new Carbon($days_of_week['monday']['start']))->endOfDay();
        $days_of_week['tuesday']['start']   = (new Carbon($days_of_week['monday']['start']))->addDay();
        $days_of_week['tuesday']['stop']    = (new Carbon($days_of_week['tuesday']['start']))->endOfDay();
        $days_of_week['wednesday']['start'] = (new Carbon($days_of_week['tuesday']['start']))->addDay();
        $days_of_week['wednesday']['stop']  = (new Carbon($days_of_week['wednesday']['start']))->endOfDay();
        $days_of_week['thursday']['start']  = (new Carbon($days_of_week['wednesday']['start']))->addDay();
        $days_of_week['thursday']['stop']   = (new Carbon($days_of_week['thursday']['start']))->endOfDay();
        $days_of_week['friday']['start']    = (new Carbon($days_of_week['thursday']['start']))->addDay();
        $days_of_week['friday']['stop']     = (new Carbon($days_of_week['friday']['start']))->endOfDay();
        $days_of_week['saturday']['start']  = (new Carbon($days_of_week['friday']['start']))->addDay();
        $days_of_week['saturday']['stop']   = (new Carbon($days_of_week['saturday']['start']))->endOfDay();
        $days_of_week['sunday']['start']    = (new Carbon($days_of_week['saturday']['start']))->addDay();
        $days_of_week['sunday']['stop']     = (new Carbon($days_of_week['sunday']['start']))->endOfDay();

        // Temporarily set the default __toString() format for Carbon
        Carbon::setToStringFormat('F jS');

        $header_row = array(
            "Project",
            "Monday " . $days_of_week['monday']['start'],
            "Tuesday " . $days_of_week['tuesday']['start'],
            "Wednesday " . $days_of_week['wednesday']['start'],
            "Thursday " . $days_of_week['thursday']['start'],
            "Friday " . $days_of_week['friday']['start'],
            "Saturday " . $days_of_week['saturday']['start'],
            "Sunday " . $days_of_week['sunday']['start'],
            "Total"
        );

        // Reset the default __toString() format for Carbon
        Carbon::resetToStringFormat();

        // csv array = [project name, monday hours, tuesday hours, wednesday hours, thursday hours, friday hours, saturday hours, sunday hours]
        // array = ("project name", "monday hours", "tuesday hours", "wednesday hours");

        $csv_array = [];

        $i = 0;
        foreach($projects as $p) {
            $csv_array[$i][] = $p['name'];

            $x = 0;
            foreach($days_of_week as $day_of_week => $day_delimiter) {
                $day_start = $day_delimiter['start']->timestamp;
                $day_stop  = $day_delimiter['stop']->timestamp;
                $project_name = $p['name'];
                $project_times = $this->database->selectWhere("
                    SELECT session_length
                    FROM entries
                    JOIN projects
                    ON entries.project_id = projects.id
                    WHERE start_time
                    BETWEEN $day_start
                    AND $day_stop
                    AND projects.name = '" . $project_name . "'
                ");
                // calculate project time for the day
                $total_for_day = 0;
                foreach($project_times as $project_time) {
                    $total_for_day += $project_time['session_length'];
                }

                // echo "Total time for $project_name on $day_of_week: $total_for_day\n";

                $project_day_total[$i][] = $total_for_day;

                if($total_for_day != 0) {
                    $csv_array[$i][] = FormatTime::formatTotal($total_for_day);
                } else {
                    $csv_array[$i][] = '--';
                }
                $x++;
            }

            // calculate project time for the week
            $project_week_total = 0;
            foreach($project_day_total[$i] as $key=>$value) {
                // echo "Key is $key and value is $value\n";
                $project_week_total += $value;
            }

            $csv_array[$i][] = FormatTime::formatTotal($project_week_total);
            $i++;
        }

        $csv_row[0] = $header_row;

        $x = 0;
        foreach($csv_array as $item) {
            $x++;
            $csv_row[$x] = $item;
        }

        // TODO: Save to better location
        // TODO: Prompt for file name (and location?)
        // TODO: Set up some sort of user preference system so user can input their preferred save location and timezone and stuff.
        $fp = fopen('timesheet.csv', 'w');

        foreach ($csv_row as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }
}
