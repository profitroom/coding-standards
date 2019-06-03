<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Package\RootPackageInterface;

class PackageConfigReader
{
    private const DEFAULT_CODING_STANDARDS = Configuration\Common::class;

    /** @var \Composer\Package\RootPackageInterface */
    private $package;

    public function __construct(RootPackageInterface $package)
    {
        $this->package = $package;
    }

    public function codingStandards(): string
    {
        $codingStandards = $this->extra('coding-standards', self::DEFAULT_CODING_STANDARDS);

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

    public function codingStandardsInstance(): Configuration\Configuration
    {
        $packageClass = $this->codingStandards();

        return new $packageClass(new RulesetLoader());
    }

    public function name(): string
    {
        return $this->package->getName();
    }

    protected function extra(string $name, $default = null): ?string
    {
        return $this->package->getExtra()[$name] ?? $default;
    }
}
