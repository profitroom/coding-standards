<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Command;

use Composer\Command\BaseCommand;
use Profitroom\CodingStandards\PackageConfigReader;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigurationCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('cs:configuration')
            ->setDescription('Creates coding standards config')
            ->addOption('force', null, InputOption::VALUE_NONE, 'Force operation even if the config already exists');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $configFile = getcwd() . '/.php_cs.dist';

        if (is_file($configFile) && !$input->getOption('force')) {
            $output->writeln('Coding standards file already exists');

            return;
        }

        $output->writeln('<info>Crafting coding standards config for the project 👷</info>');

        $packageConfig = new PackageConfigReader($this->getComposer()->getPackage());

        file_put_contents($configFile, $this->generateConfigBody($packageConfig));
    }

    protected function generateConfigBody(PackageConfigReader $packageConfig): string
    {
        return <<<EOT
<?php

require_once 'vendor/autoload.php';

return {$packageConfig->codingStandards()}::config();
EOT;
    }
}
