<?php namespace Acme;


use Carbon\Carbon;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class StopProject extends Command {
    
    public function configure()
    {
        $this->setName('stop')
             ->setDescription('Stop the timer on a project. Accepts a second argument of time-ago to adjust for situations where you forget to stop your timer.')
             ->addArgument('time_adjustment', InputArgument::OPTIONAL);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $time_adjustment = $this->getTimeAdjustment($input);

        $project_id = $this->database->fetchFirstRow('
            SELECT project_id
            FROM entries 
            WHERE stop_time IS NULL',
            'project_id'
        );

        $start_timestamp = $this->database->fetchFirstRow('
            SELECT start_time 
            FROM entries 
            WHERE stop_time IS NULL',
            'start_time'
        );

        if ($start_timestamp) {
            if(isset($time_adjustment)) {
                $stop_timestamp = round(strtotime($time_adjustment)/60)*60;
            } else {
                $stop_timestamp = round(time()/60)*60;
            }

            $start_time = Carbon::createFromTimestamp($start_timestamp);
            $stop_time = Carbon::createFromTimestamp($stop_timestamp);
            $session_length = $stop_time->timestamp - $start_timestamp;

            $is_same_day = $start_time->isSameDay($stop_time);

            if ($is_same_day) {
                // We haven't run our timer past midnight so go ahead and log this entry
                // echo "\nIt's the same day.\n";

                $this->database->query('
                    UPDATE entries 
                    SET stop_time = :stop_timestamp, session_length = :session_length
                    WHERE stop_time IS NULL',
                    compact('stop_timestamp', 'session_length')
                );
            }
            else {
                while (!$is_same_day) {
                    $stop_at_midnight = Carbon::createFromTimestamp($start_timestamp)
                        ->endOfDay()->timestamp;
                    $start_new_day = Carbon::createFromTimestamp($start_timestamp)
                        ->endOfDay()
                        ->addSecond()->timestamp;
                    $session_length = $stop_at_midnight - $start_timestamp;

                    // echo "\nIt's a different day.\n";
                    // echo "Stop at midnight: " . Carbon::createFromTimestamp($stop_at_midnight) . "\n";
                    // echo "Start new day: " . Carbon::createFromTimestamp($start_new_day) . "\n";

                    // Set stop time to 11:59pm
                    $this->database->query('
                        UPDATE entries 
                        SET stop_time = :stop_at_midnight, session_length = :session_length 
                        WHERE stop_time IS NULL',
                        compact('stop_at_midnight', 'session_length')
                    );

                    // Insert new row
                    // Set start time to 12:00am
                    $this->database->query('
                        INSERT INTO entries (project_id, start_time) 
                        VALUES (:project_id, :start_new_day)',
                        compact('project_id', 'start_new_day')
                    );

                    // Check to see if we are on the same day yet
                    $start_timestamp = $this->database->fetchFirstRow('
                        SELECT start_time 
                        FROM entries 
                        WHERE stop_time IS NULL',
                        'start_time'
                    );

                    $start_time = Carbon::createFromTimestamp($start_timestamp);
                    $stop_time = Carbon::createFromTimestamp($stop_timestamp);
                    $session_length = $stop_timestamp - $start_timestamp;

                    $is_same_day = $start_time->isSameDay($stop_time);

                    // echo "Is same day: $is_same_day\n";

                    if ($is_same_day) {
                        // echo "\nIt's finally the same day.\n";
                        $this->database->query('
                            UPDATE entries 
                            SET stop_time = :stop_timestamp, session_length = :session_length
                            WHERE stop_time IS NULL',
                            compact('stop_timestamp', 'session_length')
                        );
                    }
                }
            }

            $output->writeln((new OutputMessage('Timer stopped!'))->asInfo());
        }

        else {
            $output->writeln((new OutputMessage(' No timers currently running ಠ_ಠ '))->asError());
        }
    }

    /**
     * Determines status of time_adjustment argument
     *
     * @param InputInterface $input
     *
     * @return mixed|null
     */
    private function getTimeAdjustment(InputInterface $input)
    {
        $time_adjustment = $input->getArgument('time_adjustment');

        if($time_adjustment) {
            return $input->getArgument('time_adjustment');
        }

        return null;
    }
}