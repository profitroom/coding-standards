<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class Vault extends Mandatory
{
    protected $riskyAllowed = true;

    public function specificRules(): array
    {
        return $this->rulesets->vault();
    }

    protected function finder(): Finder
    {
        return Finder::create()->in(['app', 'config', 'model']);
    }
}
