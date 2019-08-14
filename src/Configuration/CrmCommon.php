<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class CrmCommon extends Crm
{
    protected function finder(): Finder
    {
        return parent::finder()->path('src');
    }
}
