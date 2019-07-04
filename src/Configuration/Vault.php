<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class Vault extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return [
            '@PhpCsFixer' => true,
            '@Symfony' => true,
            'blank_line_after_opening_tag' => false,
            'multiline_whitespace_before_semicolons' => [
                'strategy' => 'no_multi_line',
            ],
            'new_with_braces' => true,
            'visibility_required' => [
                'elements' => ['const', 'method', 'property'],
            ],
            'logical_operators' => true,
            'no_php4_constructor' => true,
            'standardize_not_equals' => true,
            'psr4' => true,
        ];
    }

    protected function finder(): Finder
    {
        return Finder::create()->in(['app', 'config', 'model']);
    }
}
