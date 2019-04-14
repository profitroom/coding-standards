<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

/**
 * Mandatory configuration for all projects.
 */
abstract class Mandatory implements Rulesets
{
    /** @var bool */
    protected $riskyAllowed = false;

    /** @var \PhpCsFixer\Config */
    private $config;

    public static function name(): string
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }

    public static function specificRules(): array
    {
        return [];
    }

    final public function __construct()
    {
        $rules = array_merge_recursive(static::specificRules(), self::MANDATORY);

        $this->config = (new Config(static::name()))
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
        return Finder::create()->in(getcwd());
    }
}
