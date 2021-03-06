<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FixCommand extends BaseCommand
{
    use ConfigFileRequirement;

    protected function configure()
    {
        $this->setName('cs:fix')
            ->setDescription('Fixes code in accordance to coding standards')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'Run the fixer without making changes');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$this->configFileExists()) {
            $output->writeln('<warning>Could not find the config file</warning>');

            return 1;
        }

        $fixerOutput = $exitCode = null;
        $command = './vendor/bin/php-cs-fixer fix --ansi --diff-format=udiff';

        if ($input->getOption('dry-run')) {
            $command .= ' --dry-run';
        }

        exec($command, $fixerOutput, $exitCode);
        $output->writeln($fixerOutput);

        return $exitCode;
    }
}
