# BayRewards Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/palpalani/bayrewards-laravel.svg?style=flat-square)](https://packagist.org/packages/palpalani/bayrewards-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/palpalani/bayrewards-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/palpalani/bayrewards-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/palpalani/bayrewards-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/palpalani/bayrewards-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/palpalani/bayrewards-laravel.svg?style=flat-square)](https://packagist.org/packages/palpalani/bayrewards-laravel)

BayRewards PHP SDK for Laravel Framework.

## Installation

You can install the package via composer:

```bash
composer require palpalani/bayrewards-laravel
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="bayrewards-laravel-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="bayrewards-laravel-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="bayrewards-laravel-views"
```

## Usage

```php
$bayRewards = new Palpalani\BayRewards();
echo $bayRewards->echoPhrase('Hello, Palpalani!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [palPalani](https://github.com/palpalani)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
