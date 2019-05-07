<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class Payments extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return $this->rulesets->payments();
    }

    protected function finder(): Finder
    {
        return parent::finder()->path('src')->exclude('Tests');
    }
}
