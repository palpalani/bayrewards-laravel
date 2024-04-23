# BayRewards Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/palpalani/bayrewards-laravel.svg?style=flat-square)](https://packagist.org/packages/palpalani/bayrewards-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/palpalani/bayrewards-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/palpalani/bayrewards-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/palpalani/bayrewards-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/palpalani/bayrewards-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/palpalani/bayrewards-laravel.svg?style=flat-square)](https://packagist.org/packages/palpalani/bayrewards-laravel)

BayRewards PHP SDK for Laravel Framework.

[BayRewards](https://bayrewards.io) revolutionizes e-commerce engagement with a comprehensive rewards platform. Seamlessly integrated with online stores, [BayRewards](https://bayrewards.io) offers point programs, referral incentives, and VIP perks to drive customer loyalty and sales. Elevate your e-commerce experience by incentivizing purchases, encouraging referrals, and rewarding VIP customers with exclusive benefits. With [BayRewards](https://bayrewards.io), businesses can effortlessly cultivate customer relationships and foster brand advocacy, leading to increased retention and revenue.

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
    'bayrewards_base_url' => env('BAYREWARDS_BASE_URL')
];
```

## Usage

### Get store details, after integrate with BayRewards.io

```php
use Palpalani\BayRewards\BayRewards;

$bayRewards = BayRewards::client();
$store = $client->storeDetails()->get('<Store-Access-Token>');
```

### Create a new BayReward Activity

```php
use Palpalani\BayRewards\BayRewards;

$bayRewards = BayRewards::client();
$activity = $bayRewards->createActivity()->post('<Store-Access-Token>', [
        "title" => "Title of the Activity name", //required
        "icon" => "<Icon URL>" //required
    ]);
```

### Update loyalty points 

```php
use Palpalani\BayRewards\BayRewards;

$bayRewards = BayRewards::client();
$updatePoints = $bayRewards->updatePoints()->post('<Store-Access-Token>', [
    "activity_id" => '<From activity payload>', //required
    'customer_email' => '<Customer Email>', //required
]);
```

### Get all Customers List

```php
use Palpalani\BayRewards\BayRewards;

$bayRewards = BayRewards::client();
$store = $bayRewards->allCustomers()->get(
'<Store-Access-Token>, //required  
0, //optional - page , default - 1    
0,//optional - limit , default - 25    
0,//optional - type  , default - NaN    
"" //optional - search'
);
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
