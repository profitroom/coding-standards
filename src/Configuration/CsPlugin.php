<?php

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

/**
 * Plugin's very own configuration.
 */
class CsPlugin extends Basic
{
    public function config(): Config
    {
        return parent::config()->setRiskyAllowed(true);
    }

    protected function finder(): Finder
    {
        return parent::finder()->in(__DIR__ . '/..');
    }

    protected function specificRules(): array
    {
        return [
            'declare_strict_types' => true,
        ];
    }
}
