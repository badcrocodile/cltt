<?php namespace Acme;


use Carbon\Carbon;

class FormatTime {
    /**
     * @param $seconds
     * @return string
     */
    public static function pluralizeMinute($seconds)
    {
        return ($seconds % (60 * 60) < 120) && ($seconds % (60 * 60) >= 60) ? "minute" : "minutes";
    }

    /**
     * @param $seconds
     * @return string
     */
    public static function pluralizeHour($seconds)
    {
        return $seconds < (60 * 60 * 2) ? "hour" : "hours";
    }

    /**
     * @param $total_seconds
     * @param bool $long_format
     * @return string
     */
    public static function formatTotal($total_seconds, $long_format = true)
    {
        $hours   = floor($total_seconds / 3600);
        $minutes = floor(($total_seconds / 60) % 60);
        $seconds = $total_seconds % 60;

        if ($long_format) {
            $pluralize_minute = FormatTime::pluralizeMinute($total_seconds);
            $pluralize_hour   = FormatTime::pluralizeHour($total_seconds);

            return ($total_format = (int)$total_seconds < (60 * 60) ? "$minutes $pluralize_minute" : "$hours $pluralize_hour, $minutes $pluralize_minute");
        }

        return sprintf("%02d:%02d", $hours, $minutes);
    }

    /**
     * @param $project_total_seconds
     * @return mixed
     */
    public static function formatProjectTotal($project_total_seconds)
    {
        // Sooo... converting seconds to h:i:s kinda sucks no matter which way you go
        // especially when you need to support hour counts that exceed 24 hours
        // I'd argue this is cleaner than chaining a bunch of floor operations.
        $dtF = new Carbon("@0"); // What? Can't instantiate empty instance of Carbon??
        $dtT = new Carbon("@$project_total_seconds"); // Carbon hack to make it work
        $total_format = FormatTime::formatTotal($project_total_seconds, false);

        return $project_total = $dtF->diff($dtT)->format($total_format);
    }
}