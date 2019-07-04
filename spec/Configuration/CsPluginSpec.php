<?php

namespace spec\Profitroom\CodingStandards\Configuration;

use PhpSpec\ObjectBehavior;
use Profitroom\CodingStandards\Configuration\CsPlugin;

class CsPluginSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CsPlugin::class);
    }

    function it_allows_to_run_risky_rules()
    {
        $this->configCopy()->getRiskyAllowed()->shouldBe(true);
    }
}
