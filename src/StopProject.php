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

    public function execute(InputInterface $input, OutputInterface $output)
    {
        /* @TODO
         * Let me run multiple projects at the same time.
         */
        $project_id = $this->database->fetchFirstRow('
            SELECT project_id
            FROM entries 
            WHERE stop_time IS NULL',
            'project_id'
        );

        $is_same_day = false;

        while(!$is_same_day) {
            // loop through checking is same day and updating DB as necessary
            // until we get to same day, which with any luck will usually be the
            // same day unless we are working really hard or forgot to stop our timer.

            echo "\nIt's a different day.\n";

            $stop_timestamp = round(time()/60)*60; // round to nearest minute

            $start_timestamp = $this->database->fetchFirstRow('
                SELECT start_time 
                FROM entries 
                WHERE stop_time IS NULL',
                'start_time'
            );

            $start_time  = Carbon::createFromTimestamp($start_timestamp);
            $stop_time   = Carbon::createFromTimestamp($stop_timestamp);
            $is_same_day = $start_time->isSameDay($stop_time);

            $stop_at_midnight = Carbon::create($start_time)->endOfDay()->timestamp;
            $start_new_day    = Carbon::create($stop_at_midnight)->addMinute()->timestamp;

            $this->database->query('
                UPDATE entries 
                SET stop_time = :stop_at_midnight 
                WHERE stop_time IS NULL',
                compact('stop_at_midnight')
            );

            $this->database->query('
                INSERT INTO entries (project_id, start_time) 
                VALUES (:project_id, :start_new_day)',
                compact('project_id', 'start_new_day')
            );

            if ($is_same_day) {
                // haven't passed midnight so go ahead an putter in the database
                $this->database->query('
                UPDATE entries 
                SET stop_time = :stop_time 
                WHERE stop_time IS NULL',
                    compact('stop_time')
                );

                echo "\nIt's the same day.\n";

                exit();
            }
        }



        $output->writeln('<info>Timer stopped!</info>');
    }

}