<?php

namespace spec\Profitroom\CodingStandards\Resolver\Strategy;

use Composer\Package\RootPackageInterface as Package;
use PhpSpec\ObjectBehavior;
use Profitroom\CodingStandards\Resolver\Strategy\PackageExtraData;

class PackageExtraDataSpec extends ObjectBehavior
{
    function let(Package $package)
    {
        $this->beConstructedWith($package);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PackageExtraData::class);
    }

    function it_resolves_configuration_based_on_packages_extra_data(Package $package)
    {
        $package->getExtra()->willReturn(['coding-standards' => 'FooBar']);

        $this->resolve()->shouldBe('FooBar');
    }

    function it_does_not_resolve_configuration_when_data_key_is_not_present(Package $package)
    {
        $package->getExtra()->willReturn([]);

        $this->resolve()->shouldBeNull();
    }
}
