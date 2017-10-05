<?php namespace Cltt;


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
     * Takes an array of start_time/stop_time formatted as timestamps.
     * Returns a human readable array of dates/times ready for display.
     *
     * @param $timesArray
     * @return array
     */
    public static function sessionTimeEntries($timesArray) {
        $x = 0;
        $session_times = [];
        foreach ($timesArray as $times_array) {
            $total_in_seconds = CalculateTime::sessionTotalInSeconds($times_array['stop_time'], $times_array['start_time']);
            $total_format = FormatTime::formatTotal($total_in_seconds, false);
            $session_times[$x]['id']    = $times_array['id'];
            $session_times[$x]['date']  = date('D, M dS, Y', $times_array['start_time']);
            $session_times[$x]['start'] = date('h:i A', $times_array['start_time']);
            $session_times[$x]['stop']  = date('h:i A', $times_array['stop_time']);
            $session_times[$x]['total'] = Carbon::createFromTimestamp($times_array['start_time'])
                ->diff(Carbon::createFromTimestamp($times_array['stop_time']))
                ->format($total_format);
            $x++;
        }

        return $session_times;
    }

    /**
     * FIXME: Adding the stuff we need in this way isn't sustainable. We should be able to just pass the data fields we want into a single method (id, name, etc)
     * @param $timesArray
     * @return array
     */
    public static function sessionTimeEntriesWithProjectName($timesArray) {
        $x = 0;
        $session_times = [];
        foreach ($timesArray as $times_array) {
            if($times_array['stop_time'] === NULL) {
                $total_in_seconds = CalculateTime::sessionTotalInSeconds(time(), $times_array['start_time']);
                $total_format = FormatTime::formatTotal($total_in_seconds, false);
                $session_times[$x]['date']  = date('D M d', $times_array['start_time']);
                $session_times[$x]['id']    = $times_array['id'];
                $session_times[$x]['name']  = $times_array['name'];
                $session_times[$x]['start'] = date('h:i a', $times_array['start_time']);
                $session_times[$x]['stop'] = "Running...";
                $session_times[$x]['total'] = Carbon::createFromTimestamp($times_array['start_time'])
                    ->diff(Carbon::createFromTimestamp($times_array['stop_time']))
                    ->format($total_format);

                $x++;
            } else {
                $total_in_seconds = CalculateTime::sessionTotalInSeconds($times_array['stop_time'], $times_array['start_time']);
                $total_format = FormatTime::formatTotal($total_in_seconds, false);
                $session_times[$x]['date']  = date('D M d', $times_array['start_time']);
                $session_times[$x]['id']    = $times_array['id'];
                $session_times[$x]['name']  = $times_array['name'];
                $session_times[$x]['start'] = date('h:i a', $times_array['start_time']);
                $session_times[$x]['stop']  = date('h:i a', $times_array['stop_time']);
                $session_times[$x]['total'] = Carbon::createFromTimestamp($times_array['start_time'])
                    ->diff(Carbon::createFromTimestamp($times_array['stop_time']))
                    ->format($total_format);

                $x++;
            }
        }

        return $session_times;
    }

    /**
     * Calculates the total time (in seconds) spent on a project
     *
     * @param      $timesArray
     * @param bool $sort_by_project
     *
     * @return int
     */
    public static function computeProjectTotalSeconds($timesArray, $sort_by_project = false) {
        $project_total_seconds = 0;

        $x = 0;

        foreach ($timesArray as $times_array) {
            // Account for currently running timers
            if($times_array['stop_time'] === NULL) {
                $times_array['stop_time'] = time();
            }

            $total_in_seconds = CalculateTime::sessionTotalInSeconds($times_array['stop_time'], $times_array['start_time']);

            $project_total_seconds += $total_in_seconds;

            $x++;
        }

        return $project_total_seconds;
    }

    /**
     * Takes a mixed array that contains start/stop times (among other things).
     * Returns a clean array containing only start/stop times.
     *
     * @param $mixedArray
     * @return mixed
     */
    public static function getTimesFromMixedArray($mixedArray) {
        foreach ($mixedArray as $key => $value) {
            if($key == 'start_time' || $key == 'stop_time') {
                $session_times[$key] = $value;
            }
        }

        return $session_times;
    }
}