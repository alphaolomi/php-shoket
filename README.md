# Shoket Client for PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shoket/php-shoket.svg?style=flat-square)](https://packagist.org/packages/shoket/php-shoket)
[![Tests](https://github.com/alphaolomi/php-shoket/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/alphaolomi/php-shoket/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/shoket/php-shoket.svg?style=flat-square)](https://packagist.org/packages/shoket/php-shoket)


A Truly simple payments for your business. Shoket makes online payments more easier for all kind of business in Tanzania. From startups, small businesses to medium and large businesses.

## Documentation

You can find the documentation for this package on [Docs](https://alphaolomi.github.io/php-shoket/)

## Installation

> Requires PHP 8.0 or higher

> For Laravel users there is a dedicated intergration package [laravel-shoket](https://github.com/alphaolomi/laravel-shoket)

You can install the package via composer:

```bash
composer require shoket/php-shoket
```

## Usage

```php
// Create a new instance of the client
$shoket = new Shoket(['apiSecret' => 'your-api-key']);

// Make a payment request
$response = $shoket->makePaymentRequest([
    "amount" => "5000",
    "customer_name" => "John Doe",
    "email" => "john@user.com",
    "number_used" => "255612345678",
    "channel" => "Tigo",
]);

// Print the response
print_r($response);
```

## API Available

-   makePaymentRequest
-   verifyPayment


##  Make payment request API
Example
```php
// Create a new instance of the client
$shoket = new Shoket(['apiSecret' => 'your-api-key']);

// Make a payment request
$response = $shoket->makePaymentRequest([
    "amount" => "5000",
    "customer_name" => "John Doe",
    "email" => "john@user.com",
    "number_used" => "255612345678",
    "channel" => "Tigo",
]);

// Print the response
var_dump($response);
```

##   verifyPayment API
Example
```php

$shoketClient = new Shoket(['apiSecret' => 'your-api-key']);

// Get the payment reference from the a successful payment request
// Sample: adz49dS428b7kbDTdG4MN
$reference = 'your-reference-number'; 

$response  = $shoketClient->verifyPaymentRequest($reference,[
    "provider_name"=> "Vodacom",
    "provider_code"=> "MPESA"
]);

var_dump($response);
```
## Testing
Uses [Pest Testing Framework](https://pestphp.com/)

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Alpha Olomi](https://github.com/alphaolomi)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
