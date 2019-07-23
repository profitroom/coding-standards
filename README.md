# Coding Standards Plugin

Maintaining miscellaneous coding standards among company's products is very difficult and time-consuming.  
The purpose of this plugin is to ensure compliance with the adopted standards and manage them. 
  
## Installation

This package can be installed via Composer:

```bash
composer require --dev profitroom/coding-standards:^1.0
```

Since package is still in development stage, you have to set minimum stability requirements in your `composer.json`:
```json
{
    …
    "minimum-stability": "dev",
    "prefer-stable": true
}
```

If there is no fixer config (`.php_cs.dist`) in your project, then installing or updating plugin will handle creating it for you.   
Otherwise it is possible to overwrite existing config using [composer cs:configuration --force](#commands).  

## Commands

Plugin provides some useful commands:

- `cs:configuration [options]` - creates coding standards config file
- `cs:fix [options]` - fixes code in accordance to coding standards

## Specific rules and paths

There are situations in which default configuration is not enough. 
It is possible to define rules and paths specific for a concrete project by pointing different configuration 
provided by the plugin.  
For this purpose use arbitrary extra data in `composer.json`, e.g.: 
```json
{
    …
    "extra": {
        "coding-standards": "Profitroom\\CodingStandards\\Configuration\\Common"
    }
}
```
and update config file using [cs:configuration](#commands) command.

## Contribute

Everyone is more than welcome to [contribute](CONTRIBUTING.md). 
