<?php

namespace spec\Profitroom\CodingStandards\Resolver;

use Exception;
use PhpSpec\ObjectBehavior;
use Profitroom\CodingStandards\Resolver\Configuration;
use Profitroom\CodingStandards\Resolver\Resolver;
use Profitroom\CodingStandards\Resolver\Strategy;
use stdClass;

class ConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Configuration::class);
    }

    function it_returns_first_configuration_that_has_been_resolved($unsuccessfull, $successfull)
    {
        $unsuccessfull->beADoubleOf(Strategy\PackageExtraData::class);
        $successfull->beADoubleOf(Strategy\PackageExtraData::class);
        $successfull->resolve()->willReturn('FooBar');

        $this->beConstructedWith([$unsuccessfull, $successfull, $unsuccessfull]);

        $this->resolve()->shouldBe('FooBar');
    }

    function it_returns_default_configuration_when_none_has_been_resolved($unsuccessfull)
    {
        $unsuccessfull->beADoubleOf(Strategy\PackageExtraData::class);

        $this->beConstructedWith([$unsuccessfull, $unsuccessfull]);

        $this->resolve()->shouldBe(Resolver::DEFAULT_CONFIGURATION);
    }

    function it_filters_out_invalid_strategies()
    {
        $this->beConstructedWith([Strategy\PackageExtraData::class, new stdClass()]);

        $this->shouldNotThrow(Exception::class)->during('resolve');
    }
}
