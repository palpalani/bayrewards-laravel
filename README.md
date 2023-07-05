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
You can publish the config file with:

```bash
php artisan vendor:publish --tag="bayrewards-laravel-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

Get store details, after integrate with BayRewards.io
```php
use Palpalani\BayRewards\BayRewards;

$bayRewards = BayRewards::client();
$store = $client->storeDetails()->get('<Store-Access-Token>');
```

Create a new BayReward Activity
```php
use Palpalani\BayRewards\BayRewards;

$bayRewards = BayRewards::client();
$activity = $client->createActivity()->post('<Store-Access-Token>', [
        "title" => "Title of the Activity name", //required
        "icon" => "<Icon URL>" //required
    ]);
```

Update loyalty points 
```php
use Palpalani\BayRewards\BayRewards;

$bayRewards = BayRewards::client();
$updatePoints = $client->updatePoints()->post('<Store-Access-Token>', [
    "activity_id" => '<From activity payload>', //required
    'customer_email' => '<Customer Email>', //required
]);
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
