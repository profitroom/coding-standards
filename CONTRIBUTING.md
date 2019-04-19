# Contributing

Thank you so much for your interest in contributing 🙇  
All types of contributions are encouraged and valued. Code contributions of just about any size are acceptable!

There are just few rules to follow 🤠

## Commit messages

Please follow the [gitmoji guide](https://gitmoji.carloscuesta.me/about) for using [emojis](http://emoji.muan.co/) on commit messages.

## Customization

It is very likely that your project follows specific coding standards. 
If this is the case, then feel free to create merge request containing your configuration.  

Custom configuration must extend mandatory coding standards.
```php
<?php declare(strict_types=1);

namespace Profitroom\CodingStandards\Configuration;

use PhpCsFixer\Finder;

class YourCustom extends Mandatory
{
    public function specificRules(): array
    {
        return $this->rulesets->customRuleset();
    }
    
    protected function finder(): Finder
    {
        return parent::finder()->path('custom_path');
    }
}
```
Additionally you should create a ruleset file within the `./rulesets` directory.  
E.g., for ruleset "customRuleset", this should look like this:  
```yaml
# ./rulesets/custom_rules.yaml
rules:
    blank_line_after_opening_tag: false
    visibility_required:
        elements: [const, method, property]
``` 
The list of available rules can be found [here](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/README.rst).
