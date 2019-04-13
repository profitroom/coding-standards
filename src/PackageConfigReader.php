<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Package\RootPackageInterface;
use Profitroom\CodingStandards\Configuration\Common;

class PackageConfigReader
{
    public static function codingStandard(RootPackageInterface $rootPackage): string
    {
        return $rootPackage->getExtra()['coding-standard'] ?? Common::class;
    }
}
