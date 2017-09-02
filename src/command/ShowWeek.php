<?php namespace Cltt;


use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\Table;
use Carbon\Carbon;

class ShowWeek extends ShowDates {

    public function configure()
    {
        $this->setName('week')
             ->setDescription('Display times logged during a specific week.')
             ->addArgument('week', InputArgument::OPTIONAL);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param bool                                              $paginated
     *
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output, $paginated=false)
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

        if($paginated) {
            // Get all sessions during week excluding currently running
            $sessions = $this->database->fetchSessionsByDate($date_week_start, $date_week_end);

            // Get all comments attached to those sessions excluding currently running
            $comments = $this->database->fetchCommentsByDate($date_week_start, $date_week_end);
        } else {
            // Get all sessions during week including currently running
            $sessions = $this->database->fetchSessionsByDate($date_week_start, $date_week_end, true);

            // Get all comments attached to those sessions including currently running
            $comments = $this->database->fetchCommentsByDate($date_week_start, $date_week_end, true);
        }

        $session = new Session($sessions);

        $sessions_table = new Table($output);

        $comments_table = new Table($output);

        $project_total = $session->formatProjectTotal();

        $table_header_message = (new OutputMessage((new Carbon($date_week))->startOfWeek()->toFormattedDateString() . " - " . (new Carbon($date_week))->endOfWeek()->toFormattedDateString()))->asComment();

        $table_headers[] = [new TableCell($table_header_message, ['colspan' => 6])];
        $table_headers[] = ['ID', 'Project', 'Date', 'Start Time', 'Stop Time', 'Session Length'];

        $table_rows   = $session->getSessionTimesWithProjectName();
        $table_rows[] = new TableSeparator();
        $table_rows[] = [new TableCell("<comment>Total:</comment>", array('colspan' => 5)), new TableCell("<comment>$project_total</comment>", ['colspan' => 1])];

        $sessions_table->setHeaders($table_headers)->setRows($table_rows)->render();

        $comments_table_headers[] = [new TableCell("Comments", ['colspan' => 4])];
        $comments_table_headers[] = ['ID', 'Project', 'Comment', 'Date'];

        // Make each comment timestamp human readable
        $x = 0;
        foreach($comments as $comment) {
            $comments[$x]['timestamp'] = (new Carbon($comment['timestamp']))->format('D, M dS, Y');
            $x++;
        }

        $comments_table->setHeaders($comments_table_headers)->setRows($comments)->render();

        $this->paginate($input, $output, $date_week);
    }

    /**
     * Paginates through results by week
     *
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param Carbon                                            $starting_week
     */
    public function paginate(InputInterface $input, OutputInterface $output, carbon $starting_week) {
        $current_week = $starting_week;

        $helper = $this->getHelper('question');

        $output->writeln((new OutputMessage("")));

        $question = new Question('([<info>n</info>]ext | [<info>p</info>]revious | [<info>e</info>]xport | [<info>q</info>]uit) => ', 'null');

        $paginate = $helper->ask($input, $output, $question);

        switch ($paginate) {
            case "n":
                $input->setArgument('week', $current_week->addWeek());
                $this->execute($input, $output, $paginated=true);
                break;
            case "p":
                $input->setArgument('week', $current_week->subWeek());
                $this->execute($input, $output, $paginated=true);
                break;
            case "e":
                $command = $this->getApplication()->find('export');
                $arguments = array('week' => $current_week);
                $exportInput = new ArrayInput($arguments);
                $command->run($exportInput, $output);
                break;
            case "a":
                return;
        }
    }
}