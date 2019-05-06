<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Package\RootPackageInterface;

class PackageConfigReader
{
    /** @var \Composer\Package\RootPackageInterface */
    private $package;

    public function __construct(RootPackageInterface $package)
    {
        $this->package = $package;
    }

    public function codingStandards(): string
    {
        $codingStandards = $this->extra('coding-standards', Configuration\Common::class);

        if (!class_exists($codingStandards)) {
            throw new \RuntimeException("Configuration [{$codingStandards}] does not exist.");
        }

        if (!is_subclass_of($codingStandards, Configuration\Mandatory::class)) {
            throw new \RuntimeException(
                "Configuration [{$codingStandards}] must extend mandatory coding standards."
            );
        }

        return $codingStandards;
    }

    protected function extra(string $name, $default = null): ?string
    {
        return $this->package->getExtra()[$name] ?? $default;
    }
}
