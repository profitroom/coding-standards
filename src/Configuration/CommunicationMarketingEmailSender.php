<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class CommunicationMarketingEmailSender extends Communication
{
    protected function finder(): Finder
    {
        return Finder::create()->in(['src', 'config']);
    }
}
