<?php namespace Acme;


use Carbon\Carbon;

class DaysOfWeek
{
    public $day_of_week;

    /**
     * DaysOfWeek constructor.
     *
     * @param $start_of_week
     */
    public function __construct($start_of_week)
    {
        // Temporarily set the default __toString() format for Carbon
        Carbon::setToStringFormat('F jS');

        $this->day_of_week['monday']['start']    = (new Carbon($start_of_week));
        $this->day_of_week['monday']['stop']     = (new Carbon($this->day_of_week['monday']['start']))->endOfDay();
        $this->day_of_week['tuesday']['start']   = (new Carbon($this->day_of_week['monday']['start']))->addDay();
        $this->day_of_week['tuesday']['stop']    = (new Carbon($this->day_of_week['tuesday']['start']))->endOfDay();
        $this->day_of_week['wednesday']['start'] = (new Carbon($this->day_of_week['tuesday']['start']))->addDay();
        $this->day_of_week['wednesday']['stop']  = (new Carbon($this->day_of_week['wednesday']['start']))->endOfDay();
        $this->day_of_week['thursday']['start']  = (new Carbon($this->day_of_week['wednesday']['start']))->addDay();
        $this->day_of_week['thursday']['stop']   = (new Carbon($this->day_of_week['thursday']['start']))->endOfDay();
        $this->day_of_week['friday']['start']    = (new Carbon($this->day_of_week['thursday']['start']))->addDay();
        $this->day_of_week['friday']['stop']     = (new Carbon($this->day_of_week['friday']['start']))->endOfDay();
        $this->day_of_week['saturday']['start']  = (new Carbon($this->day_of_week['friday']['start']))->addDay();
        $this->day_of_week['saturday']['stop']   = (new Carbon($this->day_of_week['saturday']['start']))->endOfDay();
        $this->day_of_week['sunday']['start']    = (new Carbon($this->day_of_week['saturday']['start']))->addDay();
        $this->day_of_week['sunday']['stop']     = (new Carbon($this->day_of_week['sunday']['start']))->endOfDay();

        // Reset the default __toString() format for Carbon
        Carbon::resetToStringFormat();

        $this->getDaysOfWeek();
    }

    /**
     * @return mixed
     */
    private function getDaysOfWeek()
    {
        return $this->day_of_week;
    }
}