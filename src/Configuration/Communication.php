<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

class Communication extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return [
            '@PhpCsFixer' => true,
            '@Symfony' => true,
            'blank_line_after_opening_tag' => true,
            'declare_strict_types' => true,
            'logical_operators' => true,
            'multiline_whitespace_before_semicolons' => [
                'strategy' => 'no_multi_line',
            ],
            'new_with_braces' => true,
            'no_php4_constructor' => true,
            'psr4' => true,
            'visibility_required' => [
                'elements' => ['const', 'method', 'property'],
            ],
        ];
    }
}
