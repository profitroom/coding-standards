<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class Microservices extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return [
            '@PhpCsFixer' => true,
            '@Symfony' => true,
            'declare_strict_types' => true,
            'logical_operators' => true,
            'multiline_whitespace_before_semicolons' => [
                'strategy' => 'no_multi_line',
            ],
            'no_php4_constructor' => true,
            'psr4' => true,
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
