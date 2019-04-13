<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Command;

use Composer\Command\BaseCommand;
use Profitroom\CodingStandards\PackageConfigReader;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class ConfigurationCommand extends BaseCommand
{
    /** @var string */
    private $configFile;

    /** @var \Symfony\Component\Filesystem\Filesystem */
    private $filesystem;

    public function __construct(string $name = null)
    {
        parent::__construct($name);

        $this->configFile = getcwd() . '/.php_cs.dist';
        $this->filesystem = new Filesystem;
    }

    protected function configure()
    {
        $this->setName('cs:configuration')
            ->setDescription('Create coding standards config')
            ->addOption('force', null, InputOption::VALUE_NONE, 'Force operation even if the config already exists');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->filesystem->exists($this->configFile) && !$input->getOption('force')) {
            $output->writeln('Coding standards file already exists');

            return;
        }

        $output->writeln('<info>Crafting coding standards config for the project 👷</info>');

        $codingStandards = PackageConfigReader::codingStandards($this->getComposer()->getPackage());

        $this->filesystem->dumpFile(
            $this->configFile,
            "<?php return (new {$codingStandards})->config();\n"
        );
    }
}
