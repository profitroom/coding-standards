<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

/**
 * Plugin's very own configuration.
 */
final class CsPlugin extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return $this->rulesets->csPlugin();
    }

    protected function finder(): Finder
    {
        return parent::finder()->path('src');
    }
}
