<?php


namespace Acme;


use Carbon\Carbon;

class CalculateTime {
    protected $times_array;
    protected $elapsed_time;
    protected $session_total;

    public function __construct($timesArray)
    {
        $this->times = $timesArray;
    }

    public function total_in_seconds($stop, $start)
    {
        return $this->elapsed_time = $stop - $start;
    }

    public function compute_session_length()
    {
        $x = 0;
        $session = [];
        foreach ($this->times as $times_array) {
            $total_in_seconds           = ComputeTime::total_in_seconds($times_array['stop_time'], $times_array['start_time']);
            $total_format               = FormatTime::format_total($total_in_seconds);
            $session[$x]['date']        = date('M dS, Y', $times_array['start_time']);
            $session[$x]['start']       = date('h:i A', $times_array['start_time']);
            $session[$x]['stop']        = date('h:i A', $times_array['stop_time']);
            $session_total[$x]['total'] = Carbon::createFromTimestamp($times_array['start_time'])
                ->diff(Carbon::createFromTimestamp($times_array['stop_time']))
                ->format($total_format);
            $x++;
        }

        return $this->session_total = $session_total;
    }

    public function dosomething($mystring)
    {
        $upper = strtoupper($mystring);

        // and now I have access to $this, which I can use to chain commands
        // like $this->calculatesomething()->formatsomehow();
//        var_dump($this->times);

        return $upper;
    }
}