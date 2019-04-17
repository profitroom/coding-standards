<?php

namespace spec\Profitroom\CodingStandards\Configuration;

use PhpSpec\ObjectBehavior;
use Profitroom\CodingStandards\Configuration\CsPlugin;
use Profitroom\CodingStandards\Configuration\Mandatory;
use Profitroom\CodingStandards\Configuration\Rulesets;

class CsPluginSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldBeAnInstanceOf(Mandatory::class);
        $this->shouldHaveType(CsPlugin::class);
    }

    function it_has_specific_rules()
    {
        $this->specificRules()->shouldBe(Rulesets::CODING_STYLE_PLUGIN);
    }

    function it_allows_to_run_risky_rules()
    {
        $this->config()->getRiskyAllowed()->shouldBe(true);
    }
}
