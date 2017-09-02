<?php namespace Acme;

use Carbon\Carbon;
//use PHPExcel;
//use PHPExcel_IOFactory;
use PHPExcel;
use PHPExcel_IOFactory;
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
        // The week being displayed to screen
        $week = $input->getArgument('week');
        // If no week specified use current week
        $date_week = (isset($week) ? new Carbon($week) : new Carbon());
        // Start of week
        $start_of_week = (new Carbon($date_week))->startOfWeek();
        // Days of week
        $days_of_week = new DaysOfWeek($start_of_week);
        // Get all active projects
        $projects = $this->database->fetchAll('projects');
        // Timestamp for file naming convention
        $filename_timestamp = date('Y-m-d') . "[" . time() . "]";

        $timesheet = fopen("timesheet-$filename_timestamp.xls", "w") or die("Unable to open file!");

        $times_out = "<table>";
        $times_out .= "<tr>";
        $times_out .= "<th>Project</th>";
        $times_out .= "<th>" . (new Carbon($days_of_week->day_of_week['monday']['start']))->format('l m/d/Y') . "</th>";
        $times_out .= "<th>" . (new Carbon($days_of_week->day_of_week['tuesday']['start']))->format('l m/d/Y') . "</th>";
        $times_out .= "<th>" . (new Carbon($days_of_week->day_of_week['wednesday']['start']))->format('l m/d/Y') . "</th>";
        $times_out .= "<th>" . (new Carbon($days_of_week->day_of_week['thursday']['start']))->format('l m/d/Y') . "</th>";
        $times_out .= "<th>" . (new Carbon($days_of_week->day_of_week['friday']['start']))->format('l m/d/Y') . "</th>";
        $times_out .= "<th>" . (new Carbon($days_of_week->day_of_week['saturday']['start']))->format('l m/d/Y') . "</th>";
        $times_out .= "<th>" . (new Carbon($days_of_week->day_of_week['sunday']['start']))->format('l m/d/Y') . "</th>";
        $times_out .= "<th>Total</th>";
        $times_out .= "</tr>";

        $i = 0;
        $time_entries = [];
        foreach($projects as $p) {
            $time_entries[$i][] = $p['name'];

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
                    $time_entries[$i][] = FormatTime::formatTotal($total_for_day);
                } else {
                    $time_entries[$i][] = '0';
                }

                $x++;
            }

            // calculate project time for the week
            $project_week_total = 0;
            foreach($project_day_total[$i] as $key=>$value) {
                $project_week_total += $value;
            }

            $time_entries[$i][] = FormatTime::formatTotal($project_week_total);

            $i++;
        }

        foreach($time_entries as $times) {
            // FIXME: This is a horrible way to remove empty projects from the export sheet.
            // Remove empty projects from the exported timesheet
            if(end($times) != "0 minutes") {
                $times_out .= "<tr>";
                foreach($times as $time) {
                    $times_out .= "<td>$time</td>";
                }
                $times_out .= "</tr>";
            }
        }

        $times_out .= "</table>";

        fwrite($timesheet, $times_out);

        // Build the comment section
        $date_week_start = (new Carbon($date_week))->startOfWeek()->timestamp;
        $date_week_end = (new Carbon($date_week))->endOfWeek()->timestamp;
        $comments = $this->database->fetchCommentsByDate($date_week_start, $date_week_end);
//        var_dump($comments);

        $comments_out = "";
        $comments_out .= "<table>";
        $comments_out .= "<tr></tr>";
        $comments_out .= "<tr></tr>";
        $comments_out .= "<tr></tr>";
        $comments_out .= "<tr>";
        $comments_out .= "<th>Date</th>";
        $comments_out .= "<th>Project</th>";
        $comments_out .= "<th>Comment</th>";
        $comments_out .= "</tr>";

        foreach($comments as $comment) {
            $comments_out .= "<tr>";
            $comments_out .= "<td>" . (new Carbon($comment['timestamp']))->format('l m/d/Y') . "</td>";
            $comments_out .= "<td>" . $comment['name'] . "</td>";
            $comments_out .= "<td colspan='7'>" . $comment['comment'] . "</td>";
            $comments_out .= "</tr>";
        }

        $comments_out .= "</table>";

        fwrite($timesheet, $comments_out);

        fclose($timesheet);
    }
}
