<?php

namespace spec\Profitroom\CodingStandards;

use Composer\Package\RootPackageInterface;
use PhpSpec\ObjectBehavior;
use Profitroom\CodingStandards\Configuration\Common;
use Profitroom\CodingStandards\Configuration\CsPlugin;

class PackageConfigReaderSpec extends ObjectBehavior
{
    function let($package)
    {
        $package->beADoubleOf(RootPackageInterface::class);
    }

    function it_reads_coding_standards_from_arbitrary_package_data($package)
    {
        $package->getExtra()->willReturn(['coding-standards' => CsPlugin::class]);

        $this::codingStandards($package)->shouldBe(CsPlugin::class);
    }

    function it_returns_default_coding_standards_when_none_given($package)
    {
        $package->getExtra()->willReturn([]);

        $this::codingStandards($package)->shouldBe(Common::class);
    }

    function it_checks_whether_configuration_is_valid($package)
    {
        $package->getExtra()->willReturn(['coding-standards' => 'Some\\Foo\\Configuration']);

        $this->shouldThrow()->during('codingStandards', [$package]);
    }
}
