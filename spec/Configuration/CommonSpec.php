<?php

namespace spec\Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Config;
use PhpSpec\ObjectBehavior;
use Profitroom\CodingStandards\Configuration\Common;

class CommonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Common::class);
    }

    function it_creates_config_using_factory_method()
    {
        $this::config()->shouldBeAnInstanceOf(Config::class);
    }

    function it_has_a_name()
    {
        $this::name()->shouldBe('Common');
    }

    function it_does_not_have_any_specific_rules()
    {
        $this->specificRules()->shouldHaveCount(0);
    }

    function it_calls_the_config_with_his_name()
    {
        $name = $this::name();

        $this->configCopy()->getName()->shouldBe($name);
    }

    function it_does_not_allow_to_run_risky_rules()
    {
        $this->configCopy()->getRiskyAllowed()->shouldBe(false);
    }
}
