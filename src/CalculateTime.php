<?php namespace Acme;



use Carbon\Carbon;

class CalculateTime {
    /**
     * @param $stop
     * @param $start
     * @return int
     */
    public static function sessionTotalInSeconds($stop, $start)
    {
        return (int)$elapsed_time = $stop - $start;
    }

    /**
     * @param $timesArray
     * @return array
     */
    public static function sessionTimeEntries($timesArray) {
        $x = 0;
        $session_times = [];
        foreach ($timesArray as $times_array) {
            $total_in_seconds = CalculateTime::sessionTotalInSeconds($times_array['stop_time'], $times_array['start_time']);
            $total_format = FormatTime::formatTotal($total_in_seconds);
            $session_times[$x]['date'] = date('M dS, Y', $times_array['start_time']);
            $session_times[$x]['start'] = date('h:i A', $times_array['start_time']);
            $session_times[$x]['stop'] = date('h:i A', $times_array['stop_time']);
            $session_times[$x]['total'] = Carbon::createFromTimestamp($times_array['start_time'])
                ->diff(Carbon::createFromTimestamp($times_array['stop_time']))
                ->format($total_format);
            $x++;
        }

        return $session_times;
    }

    /**
     * @param $timesArray
     * @return array
     */
    public static function computeProjectTotalSeconds($timesArray) {
        $x = 0;
        $project_total_seconds = 0;
        foreach ($timesArray as $times_array) {
            $total_in_seconds = CalculateTime::sessionTotalInSeconds($times_array['stop_time'], $times_array['start_time']);
            $project_total_seconds += $total_in_seconds;
            $x++;
        }

        return $project_total_seconds;
    }
}