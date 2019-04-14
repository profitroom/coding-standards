<?php

namespace spec\Profitroom\CodingStandards\Configuration;

use PhpSpec\ObjectBehavior;
use Profitroom\CodingStandards\Configuration\Common;
use Profitroom\CodingStandards\Configuration\Mandatory;
use Profitroom\CodingStandards\Configuration\Rulesets;

class CommonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldBeAnInstanceOf(Mandatory::class);
        $this->shouldHaveType(Common::class);
    }

    function it_has_a_name()
    {
        $this::name()->shouldBe('Common');
    }

    function it_does_not_have_any_specific_rules()
    {
        $this::specificRules()->shouldHaveCount(0);
    }

    function it_calls_the_config_with_his_name()
    {
        $name = $this::name();

        $this->config()->getName()->shouldBe($name);
    }

    function it_uses_mandatory_ruleset()
    {
        $this->config()->getRules()->shouldBe(Rulesets::MANDATORY);
    }

    function it_does_not_allow_to_run_risky_rules()
    {
        $this->config()->getRiskyAllowed()->shouldBe(false);
    }
}
