<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Resolver\Strategy;

class PackageExtraData extends PackageBased
{
    private const DATA_KEY = 'coding-standards';

    public function resolve(): ?string
    {
        return $this->package->getExtra()[self::DATA_KEY] ?? null;
    }
}
