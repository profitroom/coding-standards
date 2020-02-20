<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Resolver\Strategy;

use Composer\Package\RootPackageInterface;
use Profitroom\CodingStandards\Resolver\Resolver;

abstract class PackageBased implements Resolver
{
    /** @var \Composer\Package\RootPackageInterface */
    protected $package;

    public function __construct(RootPackageInterface $package)
    {
        $this->package = $package;
    }
}
