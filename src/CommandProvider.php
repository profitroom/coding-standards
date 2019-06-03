<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;
use Profitroom\CodingStandards\Command\ConfigurationCommand;
use Profitroom\CodingStandards\Command\FixCommand;
use Profitroom\CodingStandards\Command\GitHooksCommand;

class CommandProvider implements CommandProviderCapability
{
    public function getCommands(): array
    {
        return [
            new ConfigurationCommand,
            new FixCommand,
            new GitHooksCommand,
        ];
    }
}
