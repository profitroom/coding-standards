<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Package\RootPackageInterface;
use Profitroom\CodingStandards\Configuration\Configuration;

class ConfigurationFactory
{
    public static function createByPackage(RootPackageInterface $package): Configuration
    {
        $packageConfig = new PackageConfigReader($package);

        return static::createByFQCN($packageConfig->codingStandards());
    }

    public static function createByFQCN(string $FQCN): Configuration
    {
        if (!class_exists($FQCN)) {
            throw new \InvalidArgumentException("Configuration class {$FQCN} doest not exist!");
        }

        return new $FQCN(new RulesetLoader());
    }
}
