<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

/**
 * Plugin's very own configuration.
 */
final class CsPlugin extends Obligatory
{
    public static function specificRules(): array
    {
        return static::CODING_STYLE_PLUGIN;
    }

    public function config(): Config
    {
        return parent::config()->setRiskyAllowed(true);
    }

    protected function finder(): Finder
    {
        return parent::finder()->in(__DIR__ . '/..');
    }
}
