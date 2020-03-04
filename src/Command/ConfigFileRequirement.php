<?php

declare(strict_types=1);

namespace Profitroom\CodingStandards\Command;

trait ConfigFileRequirement
{
    protected function configFile(): string
    {
        return getcwd() . DIRECTORY_SEPARATOR . '.php_cs.dist';
    }

    protected function configFileExists(): bool
    {
        return is_file($this->configFile());
    }
}
