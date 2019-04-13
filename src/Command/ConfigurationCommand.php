<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class ConfigurationCommand extends BaseCommand
{
    /** @var string */
    private $configFile;

    /** @var \Profitroom\CodingStandards\Command\Filesystem */
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
            ->setDescription('Create config file for the PHP Coding Style fixer')
            ->addArgument('name', InputArgument::REQUIRED, 'FQCN of the configuration')
            ->addOption('force', null, InputOption::VALUE_NONE, 'Forces operation even if the config already exists');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getOption('force') && $this->filesystem->exists($this->configFile)) {
            throw new \RuntimeException('Config file already exists');
        }

        $output->writeln('<info>Crafting config file for the project... 👷</info>');

        $this->filesystem->dumpFile($this->configFile, sprintf(
            "<?php return (new %s)->config();\n",
            $input->getArgument('name')
        ));
    }
}
