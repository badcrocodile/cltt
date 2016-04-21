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
             ->setDescription('Stop the timer on a project.');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
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

        $stop_timestamp = round(time()/60)*60; // round to nearest minute

        $start_time = Carbon::createFromTimestamp($start_timestamp);
        $stop_time = Carbon::createFromTimestamp($stop_timestamp);

        $is_same_day = $start_time->isSameDay($stop_time);

        if($is_same_day) {
//            echo "\nIt's the same day.\n";

            $this->database->query('
                UPDATE entries 
                SET stop_time = :stop_timestamp
                WHERE stop_time IS NULL',
                compact('stop_timestamp')
            );
        }
        else {
            while(! $is_same_day) {
                $stop_at_midnight = Carbon::createFromTimestamp($start_timestamp)->endOfDay()->timestamp;
                $start_new_day    = Carbon::createFromTimestamp($start_timestamp)->endOfDay()->addSecond()->timestamp;
//                echo "\nIt's a different day.\n";
//                echo "Stop at midnight: " . Carbon::createFromTimestamp($stop_at_midnight) . "\n";
//                echo "Start new day: " . Carbon::createFromTimestamp($start_new_day) . "\n";

                // Set stop time to 11:59pm
                $this->database->query('
                    UPDATE entries 
                    SET stop_time = :stop_at_midnight 
                    WHERE stop_time IS NULL',
                    compact('stop_at_midnight')
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

                $is_same_day = $start_time->isSameDay($stop_time);

//                echo "Is same day: $is_same_day\n";

                if($is_same_day) {
//                    echo "\nIt's finally the same day.\n";

                    $this->database->query('
                        UPDATE entries 
                        SET stop_time = :stop_timestamp
                        WHERE stop_time IS NULL',
                        compact('stop_timestamp')
                    );
                }
            }
        }

        $output->writeln((new OutputMessage('Timer stopped!'))->asInfo());
    }

}