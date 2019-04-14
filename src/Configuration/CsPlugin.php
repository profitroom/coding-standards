<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

/**
 * Plugin's very own configuration.
 */
final class CsPlugin extends Obligatory
{
    protected $riskyAllowed = true;

    public static function specificRules(): array
    {
        return static::CODING_STYLE_PLUGIN;
    }

    protected function finder(): Finder
    {
        return parent::finder()->path('src');
    }
}
