<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;

interface Configuration
{
    /**
     * Return a unique name of the configuration.
     */
    public static function name(): string;

    /**
     * Return a copy of the coding standards fixer config.
     */
    public function configCopy(): Config;

    /**
     * Return a full list of coding standards rules.
     */
    public function rules(): array;

    /**
     * Return a list of rules specific for the configuration.
     */
    public function specificRules(): array;
}
