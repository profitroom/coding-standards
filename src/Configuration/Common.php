<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

/**
 * Configuration common for all projects.
 */
class Common extends Obligatory
{
    protected function finder(): Finder
    {
        return parent::finder()->in(getcwd() . '/src');
    }
}
