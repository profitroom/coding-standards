<?php

namespace Profitroom\CodingStandards\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigurationCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('cs:configuration')
            ->setDescription('Create PhpCsFixer config file for the project');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
