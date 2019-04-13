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
use Profitroom\CodingStandards\Configuration\Obligatory;

class CodingStandardsPlugin implements PluginInterface, Capable, EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ScriptEvents::POST_UPDATE_CMD => 'onPostUpdate',
        ];
    }

    public static function onPostUpdate(Event $event): void
    {
    }

    public function activate(Composer $composer, IOInterface $io): void
    {
        $codingStandard = PackageConfigReader::codingStandard($composer->getPackage());

        if (!is_subclass_of($codingStandard, Obligatory::class)) {
            throw new \RuntimeException(
                "Coding standard [{$codingStandard}] must extend obligatory standards."
            );
        }

        if ($io->isDebug()) {
            $io->write("<info>Using {$codingStandard} coding standard</info>");
        }
    }

    public function getCapabilities(): array
    {
        return [
            CommandProviderCapability::class => CommandProvider::class,
        ];
    }
}
