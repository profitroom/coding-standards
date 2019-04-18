<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FixCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('cs:fix')
            ->setDescription('Fixes code in accordance to coding standards')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'Run the fixer without making changes');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!is_file(getcwd() . '/.php_cs.dist')) {
            $output->writeln('<warning>Couldn\'t find the config file</warning>');

            return;
        }

        $command = ['./vendor/bin/php-cs-fixer', 'fix', '--ansi', '--diff-format=udiff'];

        if ($input->getOption('dry-run')) {
            $command[] = '--dry-run';
        }

        $fixerOutput = shell_exec(implode(' ', $command));

        $output->writeln($fixerOutput);
    }
}
