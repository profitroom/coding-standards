<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

class Crm extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return [
            '@PhpCsFixer' => true,
            '@Symfony' => true,
            'blank_line_after_opening_tag' => true,
            'multiline_whitespace_before_semicolons' => [
                'strategy' => 'no_multi_line',
            ],
            'new_with_braces' => true,
            'no_superfluous_phpdoc_tags' => false,
            'single_line_throw' => false,
            'visibility_required' => [
                'elements' => ['const', 'method', 'property'],
            ],
        ];
    }
}
