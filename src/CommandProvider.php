<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;
use Profitroom\CodingStandards\Command\ConfigurationCommand;

class CommandProvider implements CommandProviderCapability
{
    public function getCommands(): array
    {
        return [
            new ConfigurationCommand,
        ];
    }
}
