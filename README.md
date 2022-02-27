# Shoket Client for PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alphaolomi/php-shoket.svg?style=flat-square)](https://packagist.org/packages/shoket/php-shoket)
[![Tests](https://github.com/alphaolomi/php-shoket/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/alphaolomi/php-shoket/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/shoket/php-shoket.svg?style=flat-square)](https://packagist.org/packages/shoket/php-shoket)

## Documentation

You can find the documentation for this package on [Docs](https://alphaolomi.github.io/php-shoket/)

## Installation

You can install the package via composer:

```bash
composer require shoket/php-shoket
```

## Usage

```php
$shoket = new Shoket(['apiSecret' => 'your-api-key']);

$response = $shoket->makePaymentRequest([
    "amount" => "5000",
    "customer_name" => "John Doe",
    "email" => "john@user.com",
    "number_used" => "255612345678",
    "channel" => "Tigo",
]);

print_r($response);
```

## API Documentation

-   makePaymentRequest
-   verifyPayment

## Testing

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
