# Contributing

Thank you so much for your interest in contributing 🙇  
All types of contributions are encouraged and valued. Code contributions of just about any size are acceptable!

There are just few rules to follow 🤠

## Commit messages

Please follow the [gitmoji guide](https://gitmoji.carloscuesta.me/about) for using [emojis](http://emoji.muan.co/) on 
commit messages.

## Customization

It is very likely that your project follows specific coding standards. 
If this is the case, then feel free to create merge request containing your configuration or just extend mandatory 
coding standards within your codebase.
```php
<?php

use PhpCsFixer\Finder;
use Profitroom\CodingStandards\Configuration\Mandatory;

class MyCustomConfiguration extends Mandatory
{
    public function specificRules(): array
    {
        return [
            'blank_line_after_opening_tag' => false,
        ];
    }
    
    protected function finder(): Finder
    {
        return parent::finder()->path('custom_path');
    }
}
```
The list of available rules can be found [here](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/README.rst). 
In order to use risky rules you must explicitly enable the `$riskyAllowed` flag.
