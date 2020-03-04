<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Resolver;

class Configuration implements Resolver
{
    /** @var \Profitroom\CodingStandards\Resolver\Resolver[] */
    private $strategies;

    public function __construct(array $strategies = [])
    {
        $this->strategies = array_filter($strategies, function ($strategy) {
            return is_object($strategy) && $strategy instanceof Resolver;
        });
    }

    public function resolve(): ?string
    {
        foreach ($this->strategies as $strategy) {
            $configuration = $strategy->resolve();

            if ($configuration !== null) {
                return $configuration;
            }
        }

        return self::DEFAULT_CONFIGURATION;
    }
}
