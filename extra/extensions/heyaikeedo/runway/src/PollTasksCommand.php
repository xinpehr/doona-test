<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'runway:poll-tasks',
    description: 'Poll Runway tasks for status updates'
)]
class PollTasksCommand extends Command
{
    public function __construct(
        private TaskPoller $poller,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Polling Runway tasks...');
        
        try {
            $this->poller->pollPendingTasks();
            $output->writeln('✅ Polling completed successfully');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('❌ Polling failed: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
