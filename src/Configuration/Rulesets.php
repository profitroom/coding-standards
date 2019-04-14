<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

interface Rulesets
{
    public const CODING_STYLE_PLUGIN = [
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
    public const MANDATORY = [
        '@PSR2' => true,
        'concat_space' => ['spacing' => 'one'],
        'general_phpdoc_annotation_remove' => ['annotations' => ['author']],
        'new_with_braces' => false,
        'ordered_class_elements' => [
            'order' => [
                'use_trait', 'constant_public', 'constant_protected', 'constant_private',
                'property_public_static', 'property_protected_static', 'property_private_static',
                'property_public', 'property_protected', 'property_private',
                'method_public_static', 'method_protected_static', 'method_private_static',
                'construct', 'destruct',
                'method_public', 'method_protected', 'method_private',
                'magic', 'phpunit',
            ],
            'sortAlgorithm' => 'alpha',
        ],
    ];
}
