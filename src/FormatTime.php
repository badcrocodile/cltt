<?php namespace Acme;



use Carbon\Carbon;

class FormatTime {
    /**
     * @param $seconds
     * @return string
     */
    public static function pluralize_minute($seconds)
    {
        return ($seconds % (60 * 60) < 120) && ($seconds % (60 * 60) >= 60) ? "minute" : "minutes";
    }

    /**
     * @param $seconds
     * @return string
     */
    public static function pluralize_hour($seconds)
    {
        return $seconds < (60 * 60 * 2) ? "hour" : "hours";
    }

    /**
     * @param $total_seconds
     * @param bool $long_format
     * @return string
     */
    public static function format_total($total_seconds, $long_format = true)
    {
        $hours   = floor($total_seconds / 3600);
        $minutes = floor(($total_seconds / 60) % 60);
        $seconds = $total_seconds % 60;

        if ($long_format) {
            $pluralize_minute = FormatTime::pluralize_minute($total_seconds);
            $pluralize_hour   = FormatTime::pluralize_hour($total_seconds);

            return ($total_format = (int)$total_seconds < (60 * 60) ? "$minutes $pluralize_minute, $seconds seconds" : "$hours $pluralize_hour, $minutes $pluralize_minute, %s seconds");
        }

        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }

    /**
     * @param $project_total_seconds
     * @return mixed
     */
    public static function format_project_total($project_total_seconds)
    {
        // Sooo... converting seconds to h:i:s kinda sucks no matter which way you go
        // especially when you need to support hour counts that exceed 24 hours
        // I'd argue this is cleaner than chaining a bunch of floor operations.
        $dtF = new Carbon("@0"); // What? Can't instantiate empty instance of Carbon??
        $dtT = new Carbon("@$project_total_seconds"); // Carbon hack to make it work
        $total_format = FormatTime::format_total($project_total_seconds);

        return $project_total = $dtF->diff($dtT)->format($total_format);
    }
}