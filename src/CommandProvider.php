<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;

class CommandProvider implements CommandProviderCapability
{
    public function getCommands(): array
    {
        return [
            new Command\ConfigurationCommand(),
            new Command\FixCommand(),
            new Command\LintCommand(),
        ];
    }
}
