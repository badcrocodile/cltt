<?php namespace Acme;



use Carbon\Carbon;

class ComputeTime
{
    /**
     * @param $stop
     * @param $start
     * @return int
     */
    public static function total_in_seconds($stop, $start)
    {
        return (int)$elapsed_time = $stop - $start;
    }

    /**
     * @param $timesArray
     * @return array
     */
    public static function compute_session_length($timesArray) {
        $x = 0;
        $session = [];
        foreach ($timesArray as $times_array) {
            $total_in_seconds = ComputeTime::total_in_seconds($times_array['stop_time'], $times_array['start_time']);
            $total_format = FormatTime::format_total($total_in_seconds);
            $session[$x]['date'] = date('M dS, Y', $times_array['start_time']);
            $session[$x]['start'] = date('h:i A', $times_array['start_time']);
            $session[$x]['stop'] = date('h:i A', $times_array['stop_time']);
            $session[$x]['total'] = Carbon::createFromTimestamp($times_array['start_time'])
                ->diff(Carbon::createFromTimestamp($times_array['stop_time']))
                ->format($total_format);
            $x++;
        }

        return $session;
    }

    /**
     * @param $timesArray
     * @return array
     */
    public static function compute_project_total_seconds($timesArray) {
        $x = 0;
        $project_total_seconds = 0;
        foreach ($timesArray as $times_array) {
            $total_in_seconds = ComputeTime::total_in_seconds($times_array['stop_time'], $times_array['start_time']);
            $project_total_seconds += $total_in_seconds;
            $x++;
        }

        return $project_total_seconds;
    }
}