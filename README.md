# Scaffold tests for your Livewire components

[![Latest Version on Packagist](https://img.shields.io/packagist/v/little-green-man/livewire-tests-generator.svg?style=flat-square)](https://packagist.org/packages/little-green-man/livewire-tests-generator)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/little-green-man/livewire-tests-generator/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/little-green-man/livewire-tests-generator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/little-green-man/livewire-tests-generator/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/little-green-man/livewire-tests-generator/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/little-green-man/livewire-tests-generator.svg?style=flat-square)](https://packagist.org/packages/little-green-man/livewire-tests-generator)
[![Treeware](https://img.shields.io/badge/dynamic/json?color=brightgreen&label=Treeware&query=%24.total&url=https%3A%2F%2Fpublic.offset.earth%2Fusers%2Ftreeware%2Ftrees)](https://treeware.earth)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Licence

This package is [Treeware](https://treeware.earth). If you use it in production, then we ask that you [**buy the world a tree**](https://plant.treeware.earth/little-green-man/livewire-tests-generator) to thank us for our work. By contributing to the Treeware forest you’ll be creating employment for local families and restoring wildlife habitats.

## Installation

You can install the package via composer:

```bash
composer require little-green-man/livewire-tests-generator
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="livewire-tests-generator-config"
```

This is the contents of the published config file:

```php
return [
    'output-directory' => base_path('tests/Unit/Http/Livewire/'),
];
```

## Usage

```bash
php artisan generate-livewire-tests
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Elliot Ali](https://github.com/kurucu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
