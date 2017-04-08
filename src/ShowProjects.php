<?php namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ShowProjects extends Command
{
    public function configure()
    {
        $this->setName('show')
             ->setDescription('Show all active projects. Pass the --archived (-a) option to view all archived projects.')
             ->setHelp('Display all active or archived projects.')
             ->addOption('archived', 'a', InputOption::VALUE_NONE, 'Display archived projects');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $show_archived = $input->getOption('archived');

        if($show_archived) {
            $output->writeln((new OutputMessage("\nCurrently archived projects:\n "))->asInfo());

            $this->showArchivedProjectsTable($output);
        } else {
            $output->writeln((new OutputMessage("\nCurrently active projects:\n "))->asInfo());

            $this->showProjectsTable($output);
        }
    }

}