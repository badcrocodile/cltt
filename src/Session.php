<?php


namespace Acme;




class Session {
    protected $times;
    protected $project_total_seconds;
    protected $session_time_entries;

    public function __construct($timesArray)
    {
        $this->times = $timesArray;
    }

    public function getProjectTotalSeconds()
    {
        return $this->project_total_seconds = CalculateTime::computeProjectTotalSeconds($this->times);
    }

    public function getSessionTimes()
    {
        return $this->session_time_entries = CalculateTime::sessionTimeEntries($this->times);
    }

    public function formatProjectTotal()
    {
        return $formatted_project_total = FormatTime::formatProjectTotal($this->getProjectTotalSeconds());
    }
}