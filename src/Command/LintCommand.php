<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LintCommand extends BaseCommand
{
    use ConfigFileRequirement;

    protected function configure()
    {
        $this->setName('cs:lint')
            ->setDescription('Checks code in accordance to coding standards');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$this->configFileExists()) {
            $output->writeln('<warning>Could not find the config file</warning>');

            return 1;
        }

        $fixerOutput = $exitCode = null;
        $command = './vendor/bin/php-cs-fixer fix -v --ansi --dry-run --stop-on-violation --using-cache=no';

        exec($command, $fixerOutput, $exitCode);
        $output->writeln($fixerOutput);

        return $exitCode;
    }
}
