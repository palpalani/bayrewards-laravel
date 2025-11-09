# BayRewards Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/palpalani/bayrewards-laravel.svg?style=flat-square)](https://packagist.org/packages/palpalani/bayrewards-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/palpalani/bayrewards-laravel.svg?style=flat-square)](https://packagist.org/packages/palpalani/bayrewards-laravel)
[![PHP Version](https://img.shields.io/packagist/php-v/palpalani/bayrewards-laravel.svg?style=flat-square)](https://packagist.org/packages/palpalani/bayrewards-laravel)
[![Laravel Version](https://img.shields.io/badge/Laravel-10.x%20%7C%2011.x%20%7C%2012.x-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/palpalani/bayrewards-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/palpalani/bayrewards-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/palpalani/bayrewards-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/palpalani/bayrewards-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![License](https://img.shields.io/packagist/l/palpalani/bayrewards-laravel.svg?style=flat-square)](https://packagist.org/packages/palpalani/bayrewards-laravel)

> BayRewards PHP SDK for Laravel Framework.

[BayRewards](https://bayrewards.io) revolutionizes e-commerce engagement with a comprehensive rewards platform. Seamlessly integrated with online stores, [BayRewards](https://bayrewards.io) offers point programs, referral incentives, and VIP perks to drive customer loyalty and sales. Elevate your e-commerce experience by incentivizing purchases, encouraging referrals, and rewarding VIP customers with exclusive benefits. With [BayRewards](https://bayrewards.io), businesses can effortlessly cultivate customer relationships and foster brand advocacy, leading to increased retention and revenue.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
  - [Using the Facade](#using-the-facade)
  - [Using Dependency Injection](#using-dependency-injection)
  - [Get Store Details](#get-store-details)
  - [Get Store Features](#get-store-features)
  - [Create Activity](#create-activity)
  - [Get Activity](#get-activity)
  - [Update Activity](#update-activity)
  - [Update Loyalty Points](#update-loyalty-points)
  - [Get Store Customers](#get-store-customers)
- [Testing](#testing)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Security Vulnerabilities](#security-vulnerabilities)
- [Credits](#credits)
- [License](#license)

## Requirements

- PHP >= 8.2
- Laravel >= 10.0 | >= 11.0 | >= 12.0

## Installation

You can install the package via [Composer](https://getcomposer.org):

```bash
composer require palpalani/bayrewards-laravel
```

The package will automatically register its service provider and facade.

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag="bayrewards-laravel-config"
```

This will create a `config/bayrewards-laravel.php` file in your config directory.

### Environment Variables

Add the following to your `.env` file:

```env
BAYREWARDS_BASE_URL=https://api.bayrewards.io
```

Replace the URL with your actual BayRewards API base URL.

## Usage

### Using the Facade

The package provides a `BayRewards` facade for easy access:

```php
use Palpalani\BayRewards\Facades\BayRewards;

$bayRewards = BayRewards::client();
```

### Using Dependency Injection

You can also use dependency injection:

```php
use Palpalani\BayRewards\BayRewards;

class YourController
{
    public function index()
    {
        $bayRewards = BayRewards::client();
        // Use $bayRewards...
    }
}
```

### Get Store Details

Retrieve store details after integrating with BayRewards.io:

```php
use Palpalani\BayRewards\Facades\BayRewards;

$bayRewards = BayRewards::client();
$store = $bayRewards->storeDetails()->get('<Store-Access-Token>');
```

### Get Store Features

Get available features for a store:

```php
use Palpalani\BayRewards\Facades\BayRewards;

$bayRewards = BayRewards::client();
$features = $bayRewards->getStoreFeatures()->get('<Store-Access-Token>');
```

### Create Activity

Create a new BayRewards activity:

```php
use Palpalani\BayRewards\Facades\BayRewards;

$bayRewards = BayRewards::client();
$activity = $bayRewards->createActivity()->post('<Store-Access-Token>', [
    'title' => 'Purchase Reward', // Required
    'icon' => 'https://example.com/icon.png', // Required
]);
```

### Get Activity

Retrieve activity details:

```php
use Palpalani\BayRewards\Facades\BayRewards;

$bayRewards = BayRewards::client();
$activity = $bayRewards->getActivity()->get('<Store-Access-Token>', '<Activity-ID>');
```

### Update Activity

Update an existing activity:

```php
use Palpalani\BayRewards\Facades\BayRewards;

$bayRewards = BayRewards::client();
$activity = $bayRewards->updateActivity()->post('<Store-Access-Token>', [
    'title' => 'Updated Purchase Reward', // Required
    'icon' => 'https://example.com/updated-icon.png', // Required
    'activity_id' => 12345, // Required
]);
```

### Update Loyalty Points

Update loyalty points for a customer:

```php
use Palpalani\BayRewards\Facades\BayRewards;

$bayRewards = BayRewards::client();
$updatePoints = $bayRewards->updatePoints()->post('<Store-Access-Token>', [
    'activity_id' => 12345, // Required - from activity payload
    'customer_email' => 'customer@example.com', // Required
]);
```

### Get Store Customers

Retrieve all customers for a store with optional pagination and filtering:

```php
use Palpalani\BayRewards\Facades\BayRewards;

$bayRewards = BayRewards::client();

// Get all customers with default pagination
$customers = $bayRewards->allCustomers()->get('<Store-Access-Token>');

// Get customers with custom pagination and filters
$customers = $bayRewards->allCustomers()->get(
    '<Store-Access-Token>', // Required
    1,                      // Optional - page number (default: 1)
    25,                     // Optional - limit per page (default: 25)
    'vip',                  // Optional - customer type filter (default: null)
    'john'                  // Optional - search query (default: '')
);
```

## Testing

Run the tests with:

```bash
composer test
```

For test coverage:

```bash
composer test-coverage
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
