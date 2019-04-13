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
