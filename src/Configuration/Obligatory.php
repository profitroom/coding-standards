<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

abstract class Obligatory implements Rulesets
{
    /** @var bool */
    protected $riskyAllowed = false;

    /** @var \PhpCsFixer\Config */
    private $config;

    public static function specificRules(): array
    {
        return [];
    }

    final public function __construct()
    {
        $rules = array_merge_recursive(static::specificRules(), self::OBLIGATORY);

        $this->config = Config::create()
            ->setFinder($this->finder())
            ->setRules($rules)
            ->setRiskyAllowed($this->riskyAllowed);
    }

    public function config(): Config
    {
        return clone $this->config;
    }

    protected function finder(): Finder
    {
        return Finder::create();
    }
}
