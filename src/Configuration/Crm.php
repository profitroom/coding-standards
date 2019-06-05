<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class Crm extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return $this->rulesets->crm();
    }

    protected function finder(): Finder
    {
        return parent::finder()->path(['app/', 'config/']);
    }
}
