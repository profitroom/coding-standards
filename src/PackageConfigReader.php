<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Package\RootPackageInterface;
use Profitroom\CodingStandards\Configuration\Common;

class PackageConfigReader
{
    public static function codingStandards(RootPackageInterface $rootPackage): string
    {
        $codingStandards = $rootPackage->getExtra()['coding-standard'] ?? Common::class;

        if (!is_subclass_of($codingStandards, Configuration\Obligatory::class)) {
            throw new \RuntimeException(
                "Configuration [{$codingStandards}] must extend obligatory coding standards."
            );
        }

        return $codingStandards;
    }
}
