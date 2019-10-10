<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class WebAssistant extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return [
            '@PhpCsFixer' => true,
            '@Symfony' => true,
            'declare_strict_types' => true,
            'multiline_whitespace_before_semicolons' => [
                'strategy' => 'no_multi_line',
            ],
            'visibility_required' => [
                'elements' => ['const', 'method', 'property'],
            ],
        ];
    }

    protected function finder(): Finder
    {
        return parent::finder()->exclude('Tests');
    }
}
