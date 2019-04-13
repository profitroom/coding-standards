<?php declare(strict_types=1);

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
            '@PhpCsFixer' => true,
            '@Symfony' => true,
            'blank_line_after_opening_tag' => false,
            'declare_strict_types' => true,
            'multiline_whitespace_before_semicolons' => [
                'strategy' => 'no_multi_line',
            ],
            'visibility_required' => [
                'elements' => ['const', 'method', 'property'],
            ],
        ];
    }
}
