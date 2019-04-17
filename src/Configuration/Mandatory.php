<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

/**
 * Mandatory configuration for all projects.
 */
abstract class Mandatory implements Configuration, Rulesets
{
    /** @var bool */
    protected $riskyAllowed = false;

    /** @var \PhpCsFixer\Config */
    private $config;

    public static function name(): string
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }

    final public function __construct()
    {
        $this->config = (new Config(static::name()))
            ->setFinder($this->finder())
            ->setRules($this->rules())
            ->setRiskyAllowed($this->riskyAllowed);
    }

    final public function config(): Config
    {
        return clone $this->config;
    }

    final public function rules(): array
    {
        return array_merge_recursive($this->specificRules(), self::MANDATORY);
    }

    public function specificRules(): array
    {
        return [];
    }

    protected function finder(): Finder
    {
        return Finder::create()->in(getcwd());
    }
}
