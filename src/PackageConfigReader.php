<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Composer\Package\RootPackageInterface;
use Profitroom\CodingStandards\Configuration\Mandatory;
use Profitroom\CodingStandards\Resolver\Configuration;
use Profitroom\CodingStandards\Resolver\Resolver;
use Profitroom\CodingStandards\Resolver\Strategy;
use RuntimeException;

class PackageConfigReader
{
    /** @var \Composer\Package\RootPackageInterface */
    private $package;

    /** @var \Profitroom\CodingStandards\Resolver\Resolver */
    private $resolver;

    public function __construct(RootPackageInterface $package, ?Resolver $resolver = null)
    {
        $this->package = $package;
        $this->resolver = $resolver ?: $this->defaultResolver();
    }

    public function codingStandards(): string
    {
        $codingStandards = $this->resolver->resolve();

        if (!class_exists($codingStandards)) {
            throw new RuntimeException("Configuration [{$codingStandards}] does not exist.");
        }

        if (!is_subclass_of($codingStandards, Mandatory::class)) {
            throw new RuntimeException(
                "Configuration [{$codingStandards}] must extend mandatory coding standards."
            );
        }

        return $codingStandards;
    }

    private function defaultResolver(): Resolver
    {
        return new Configuration([
            new Strategy\PackageExtraData($this->package),
        ]);
    }
}
