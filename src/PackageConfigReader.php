<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Package\RootPackageInterface;

class PackageConfigReader
{
    public static function codingStandards(RootPackageInterface $package): string
    {
        $codingStandards = $package->getExtra()['coding-standards'] ?? Configuration\Common::class;

        if (!is_subclass_of($codingStandards, Configuration\Mandatory::class)) {
            throw new \RuntimeException(
                "Configuration [{$codingStandards}] must extend mandatory coding standards."
            );
        }

        return $codingStandards;
    }
}
