<?php namespace Acme;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Carbon\Carbon;

class ShowTimes extends Command
{
    /**
     *
     */
    public function configure()
    {
        $this->setName('showtimes')
             ->setDescription('Display the times logged for a project.')
             ->addArgument('project', InputArgument::REQUIRED);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        // get all times logged for project_id
        // options or flags will determine output (day, week, month)
        // default will be current week?

        $project = $input->getArgument('project');

        $times = $this->database->selectWhere("SELECT start_time, stop_time FROM entries WHERE project_id = $project ORDER BY start_time ASC");

        echo $something = FormatTime::saySomething("Drupal was hard too. \n");
        echo $sometime  = ComputeTime::computeSomething("BUT IT GETS EASIER. \n");


        /**
         * @param $stop
         * @param $start
         * @return int
         */
        function total_in_seconds($stop, $start)
        {
            return (int)$elapsed_time = $stop - $start;
        }

        /**
         * @param $total_seconds
         * @param bool $long_format
         * @return string
         */
        function format_total($total_seconds, $long_format = true)
        {
            $hours   = floor($total_seconds / 3600);
            $minutes = floor(($total_seconds / 60) % 60);
            $seconds = $total_seconds % 60;

            if ($long_format) {
                $pluralize_minute = pluralize_minute($total_seconds);
                $pluralize_hour   = pluralize_hour($total_seconds);

                return ($total_format = (int)$total_seconds < (60 * 60) ? "$minutes $pluralize_minute, $seconds seconds" : "$hours $pluralize_hour, $minutes $pluralize_minute, %s seconds");
            }


            return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
        }

        /**
         * @param $seconds
         * @return string
         */
        function pluralize_minute($seconds)
        {
            return ($seconds % (60 * 60) < 120) && ($seconds % (60 * 60) >= 60) ? "minute" : "minutes";
        }

        /**
         * @param $seconds
         * @return string
         */
        function pluralize_hour($seconds)
        {
            return $seconds < (60 * 60 * 2) ? "hour" : "hours";
        }

        $x = 0;
        $session = [];
        $project_total_seconds = 0;
        foreach($times as $times_array) {
            $total_in_seconds = total_in_seconds($times_array['stop_time'], $times_array['start_time']);
            $total_format = format_total($total_in_seconds);
            $session[$x]['date']  = date('M dS, Y', $times_array['start_time']);
            $session[$x]['start'] = date('h:i A', $times_array['start_time']);
            $session[$x]['stop']  = date('h:i A', $times_array['stop_time']);
            $session[$x]['total'] = Carbon::createFromTimestamp($times_array['start_time'])
                ->diff(Carbon::createFromTimestamp($times_array['stop_time']))
                ->format($total_format);
            $project_total_seconds+=$total_in_seconds;
            $x++;
        }

        // Sooo... converting seconds to h:i:s kinda sucks no matter which way you go
        // especially when you need to support times over 24 hours
        // I'd argue this is cleaner than chaining a bunch of floor operations.
        $dtF = new Carbon("@0"); // What? Can't instantiate empty instance of Carbon??
        $dtT = new Carbon("@$project_total_seconds"); // Carbon hack to make it work
        $total_format = format_total($project_total_seconds);
        $project_total = $dtF->diff($dtT)->format($total_format);

        $table = new Table($output);

        $table->setHeaders(['Date', 'Start Time', 'Stop Time', 'Total'])->setRows($session)->render();

        $output->writeln("<info>Project Totals: $project_total</info>");

    }

}