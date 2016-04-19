<?php namespace Acme;


class Session {
    protected $times;
    protected $project_total_seconds;
    protected $session_time_entries;

    public function __construct($times_array)
    {
        $this->times = $times_array;
    }

    public function getProjectTotalSeconds()
    {
        return $this->project_total_seconds = CalculateTime::computeProjectTotalSeconds($this->times);
    }

    public function getSessionTimes()
    {
        return $this->session_time_entries = CalculateTime::sessionTimeEntries($this->times);
    }

    /**
     * Same as getSessionTimes() but includes the project name in the return array
     * 
     * @return array
     */
    public function getSessionTimesWithProjectName()
    {
        return $this->session_time_entries = CalculateTime::sessionTimeEntriesWithProjectName($this->times);
    }

    public function formatProjectTotal()
    {
        return $formatted_project_total = FormatTime::formatProjectTotal($this->getProjectTotalSeconds());
    }
}