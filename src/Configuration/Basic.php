<?php

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

abstract class Basic
{
    /** @var \PhpCsFixer\Config */
    private $config;

    private static function requiredRules(): array
    {
        return [];
    }

    final public function __construct()
    {
        $rules = array_merge_recursive(
            $this->specificRules(),
            static::requiredRules()
        );

        $this->config = Config::create()
            ->setFinder($this->finder())
            ->setRules($rules);
    }

    public function config(): Config
    {
        return $this->config;
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
