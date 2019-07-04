<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

/**
 * Plugin's very own configuration.
 */
final class CsPlugin extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return [
            '@PhpCsFixer' => true,
            '@Symfony' => true,
            'blank_line_after_opening_tag' => false,
            'declare_strict_types' => true,
            'multiline_whitespace_before_semicolons' => [
                'strategy' => 'no_multi_line',
            ],
            'new_with_braces' => false,
            'visibility_required' => [
                'elements' => ['const', 'method', 'property'],
            ],
        ];
    }

    protected function finder(): Finder
    {
        return parent::finder()->path('src');
    }
}
