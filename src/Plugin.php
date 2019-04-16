<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;
use Composer\Script\ScriptEvents;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\ConsoleOutput;

class Plugin implements PluginInterface, Capable, EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ScriptEvents::POST_UPDATE_CMD => 'onPostUpdate',
        ];
    }

    public static function onPostUpdate(Event $event): void
    {
        $composer = $event->getComposer();
        $io = $event->getIO();

        if ($io->isDebug()) {
            $packageConfig = new PackageConfigReader($composer->getPackage());
            $codingStandards = $packageConfig->codingStandards();

            $io->write("<info>Using {$codingStandards} coding standard</info>");
        }

        $command = new Command\ConfigurationCommand;
        $command->setComposer($composer);
        $command->run(new StringInput(''), new ConsoleOutput);
    }

    public function activate(Composer $composer, IOInterface $io): void
    {
    }

    public function getCapabilities(): array
    {
        return [
            CommandProviderCapability::class => CommandProvider::class,
        ];
    }
}
