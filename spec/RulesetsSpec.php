<?php

namespace spec\Profitroom\CodingStandards;

use PhpSpec\ObjectBehavior;
use Profitroom\CodingStandards\Rulesets;

class RulesetsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Rulesets::class);
    }

    function it_is_loading_ruleset_using_its_name()
    {
        $this->shouldNotThrow()->during('csPlugin');
        $this->csPlugin()->shouldBeArray();
    }

    function it_throws_an_exception_if_ruleset_does_not_exist()
    {
        $this->shouldThrow(\LogicException::class)->during('foo_ruleset');
    }
}
