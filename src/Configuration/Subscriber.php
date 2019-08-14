<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class Subscriber extends Crm
{
    protected function finder(): Finder
    {
        return Finder::create()->in(['app', 'config'])->exclude('docs');
    }
}
