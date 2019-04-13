<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

abstract class Basic
{
    /** @var \PhpCsFixer\Config */
    private $config;

    private static function requiredRules(): array
    {
        return [
            '@PSR2' => true,
            'concat_space' => ['spacing' => 'one'],
            'general_phpdoc_annotation_remove' => ['annotations' => ['author']],
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
            'new_with_braces' => false,
        ];
    }

    final public function __construct()
    {
        $rules = array_merge_recursive(
            $this->specificRules(),
            self::requiredRules()
        );

        $this->config = Config::create()
            ->setFinder($this->finder())
            ->setRules($rules);
    }

    public function config(): Config
    {
        return clone $this->config;
    }

    protected function finder(): Finder
    {
        return Finder::create();
    }

    protected function specificRules(): array
    {
        return [];
    }
}
