<?php namespace Acme;

use Carbon\Carbon;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Acme\DaysOfWeek;

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
        // The week being displayed to screen
        $week          = $input->getArgument('week');
        // If no week specified use current week
        $date_week     = (isset($week) ? new Carbon($week) : new Carbon());
        // Start of week
        $start_of_week = (new Carbon($date_week))->startOfWeek();
        // Days of wee
        $days_of_week  = new DaysOfWeek($start_of_week);
        $date_week_start    = (new Carbon($date_week))->startOfWeek()->timestamp;
        $date_week_end      = (new Carbon($date_week))->endOfWeek()->timestamp;
        // Get all active projects
        $projects      = $this->database->fetchAll('projects');
        $csv_array     = [];
        $i             = 0;

        $header_row = array(
            "Project",
            "Monday "    . $days_of_week->day_of_week['monday']['start'],
            "Tuesday "   . $days_of_week->day_of_week['tuesday']['start'],
            "Wednesday " . $days_of_week->day_of_week['wednesday']['start'],
            "Thursday "  . $days_of_week->day_of_week['thursday']['start'],
            "Friday "    . $days_of_week->day_of_week['friday']['start'],
            "Saturday "  . $days_of_week->day_of_week['saturday']['start'],
            "Sunday "    . $days_of_week->day_of_week['sunday']['start'],
            "Total"
        );

        foreach($projects as $p) {
            $csv_array[$i][] = $p['name'];

            $x = 0;
            foreach($days_of_week->day_of_week as $day_of_week => $day_delimiter) {
                $day_start     = $day_delimiter['start']->timestamp;
                $day_stop      = $day_delimiter['stop']->timestamp;
                $project_name  = $p['name'];
                $total_for_day = 0;

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
                foreach($project_times as $project_time) {
                    $total_for_day += $project_time['session_length'];
                }

                $project_day_total[$i][] = $total_for_day;

                if($total_for_day != 0) {
                    $csv_array[$i][] = FormatTime::formatTotal($total_for_day);
                } else {
                    $csv_array[$i][] = '0';
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
        $filename_timestamp = date('Y-m-d') . "[" . time() . "]";

        $fp = fopen("timesheet-$filename_timestamp.xls", "w");

        foreach ($csv_row as $fields) {
            // FIXME: This is a horrible way to remove empty projects from the export sheet.
            // Remove empty projects from the exported timesheet
            if(end($fields) != "0 minutes") {
                fputcsv($fp, $fields);
            }
        }

        $comments = $this->database->fetchCommentsByDate($date_week_start, $date_week_end);
        var_dump($comments);

        // Append all the comments
        $csv_comment_header_row = ['Date', 'Project', 'Comment'];
        $csv_comment_row = [];
        $csv_comment_row[0] = [];
        $csv_comment_row[1] = [];
        $csv_comment_row[2] = [];
        $csv_comment_row[3] = [];
        $csv_comment_row[4] = ['Date', 'Project', 'Comment'];
        $csv_comment_row[5] = ['Test', 'Wont', 'Work'];

        foreach($csv_comment_row as $item) {
            fputcsv($fp, $item);
        }

        fclose($fp);
    }
}
