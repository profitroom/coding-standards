<?php

namespace spec\Profitroom\CodingStandards\Configuration;

use PhpSpec\ObjectBehavior;
use Profitroom\CodingStandards\Configuration\CsPlugin;
use Profitroom\CodingStandards\RulesetLoader;

class CsPluginSpec extends ObjectBehavior
{
    function let(RulesetLoader $rulesets)
    {
        $rulesets->csPlugin()->willReturn(['foo' => 'bar']);
        $rulesets->mandatory()->willReturn(['baz' => 'qux']);

        $this->beConstructedWith($rulesets);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CsPlugin::class);
    }

    function it_uses_mandatory_ruleset()
    {
        $this->config()->getRules()->shouldBe(['foo' => 'bar', 'baz' => 'qux']);
    }

    function it_has_specific_rules()
    {
        $this->specificRules()->shouldBe(['foo' => 'bar']);
    }

    function it_allows_to_run_risky_rules()
    {
        $this->config()->getRiskyAllowed()->shouldBe(true);
    }
}
