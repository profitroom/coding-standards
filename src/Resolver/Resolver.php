<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Resolver;

use Profitroom\CodingStandards\Configuration\Common;

interface Resolver
{
    public const DEFAULT_CONFIGURATION = Common::class;

    public function resolve(): ?string;
}
