<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;

interface Configuration
{
    /**
     * Return a unique name of the configuration.
     *
     * @return string
     */
    public static function name(): string;

    /**
     * Return a coding standards fixer config.
     *
     * @return \PhpCsFixer\Config
     */
    public function config(): Config;

    /**
     * Return a full list of coding standards rules.
     *
     * @return array
     */
    public function rules(): array;

    /**
     * Return a list of rules specific for the configuration.
     *
     * @return array
     */
    public function specificRules(): array;
}