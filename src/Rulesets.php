<?php declare(strict_types=1);

namespace Profitroom\CodingStandards;

use Symfony\Component\Config\Exception\FileLocatorFileNotFoundException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

/**
 * @method array csPlugin()
 * @method array mandatory()
 */
class Rulesets
{
    /** @var \Symfony\Component\Config\FileLocator */
    private $fileLocator;

    public function __construct()
    {
        $this->fileLocator = new FileLocator(__DIR__ . '/../rulesets');
    }

    /**
     * @param string $fileName
     *
     * @return array
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    protected function load(string $fileName): array
    {
        $ruleset = Yaml::parseFile($this->fileLocator->locate($fileName));

        return current($ruleset);
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @throws \LogicException   if ruleset with the given name does not exist
     * @throws \RuntimeException if ruleset with the given name could not be parsed
     *
     * @return array parsed ruleset
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function __call(string $name, array $arguments)
    {
        $basename = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));

        try {
            return $this->load("${basename}.yaml");
        } catch (FileLocatorFileNotFoundException | \InvalidArgumentException $exception) {
            throw new \LogicException("Ruleset \"${name}\" does not exist");
        } catch (ParseException $exception) {
            throw new \RuntimeException("Ruleset \"${name}\" could not be parsed");
        }
    }
}
