<?php namespace Acme;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Carbon\Carbon;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

class ShowWeek extends ShowDates {

    public function configure()
    {
        $this->setName('week')
             ->setDescription('Display times logged during a specific week.')
             ->addArgument('week', InputArgument::OPTIONAL);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        /*
         * I'd prefer start of week be Saturday and end of week be Sunday but that seems
         * to break with international norms and is not how Carbon handles things.
         * Start of week is Monday. End of week is Sunday. That's how it is yo.
         * https://github.com/briannesbitt/Carbon/issues/175
         */
        $week               = $input->getArgument('week');
        $date_week          = (isset($week) ? new Carbon($week) : new Carbon());
        $date_week_start    = (new Carbon($date_week))->startOfWeek()->timestamp;
        $date_week_end      = (new Carbon($date_week))->endOfWeek()->timestamp;

        $sessions = $this->database->selectWhere("
            SELECT id, project_id, start_time, stop_time 
            FROM entries 
            WHERE stop_time 
            BETWEEN $date_week_start AND $date_week_end
        ");

        $session = new Session($sessions);

        $table = new Table($output);

        $project_total = $session->formatProjectTotal();

        $table_header_message = "<comment>" . (new Carbon($date_week))->startOfWeek()->toFormattedDateString() . " - " . (new Carbon($date_week))->endOfWeek()->toFormattedDateString() . ": </comment>";

        $table_headers[] = [new TableCell($table_header_message, ['colspan' => 5])];
        $table_headers[] = ['ID', 'Date', 'Start Time', 'Stop Time', 'Session Length'];

        $table_rows   = $session->getSessionTimes();
        $table_rows[] = new TableSeparator();
        $table_rows[] = [new TableCell("<comment>Total:</comment>", array('colspan' => 4)), new TableCell("<comment>$project_total</comment>", ['colspan' => 1])];

        $table->setHeaders($table_headers)->setRows($session->getSessionTimes())->render();

        $this->paginate($input, $output, $date_week);
    }

    public function paginate(InputInterface $input, OutputInterface $output, $starting_week) {
        $current_week = $starting_week;

        $helper = $this->getHelper('question');

        $question = new Question('Display next week or previous week? ([<info>n</info>]ext|[<info>p</info>]revious) ', 'null');

        $paginate = $helper->ask($input, $output, $question);

        switch ($paginate) {
            case "n":
                $input->setArgument('week', $current_week->addWeek());

                $this->execute($input, $output);

                break;
            case "p":
                $input->setArgument('week', $current_week->subWeek());

                $this->execute($input, $output);

                break;
        }
    }
}