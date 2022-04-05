# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nekoding/gmo-payment-gateway.svg?style=flat-square)](https://packagist.org/packages/nekoding/gmo-payment-gateway)
[![Total Downloads](https://img.shields.io/packagist/dt/nekoding/gmo-payment-gateway.svg?style=flat-square)](https://packagist.org/packages/nekoding/gmo-payment-gateway)
![GitHub Actions](https://github.com/nekoding/gmo-payment-gateway/actions/workflows/main.yml/badge.svg)

Simple package to interact GMOPG API for laravel project

## Installation

You can install the package via composer:

```bash
composer require nekoding/gmo-payment-gateway
```

## Usage

```php
// Usage description here
// via GmoPaymentGateway Class

$gmo = new \Nekoding\GmoPaymentGateway\GmoPaymentGateway();

// if you want interact with GMO Site API use this
$siteApi = $gmo->useSiteApi();

// if you want interact with GMO Shop API use this
$shopApi = $gmo->useShopApi();
```

### Configuration
You can change api credential via `.env` or via `config/config.php`  

```
Available Configuration

| ENV Key              | Description                                                                  |
|----------------------|------------------------------------------------------------------------------|
| GMO_API_SANDBOX_MODE | If true package will use sandbox endpoint instead production endpoint        |
| GMO_SITE_ID          | Credential to connect GMO Site API                                           |
| GMO_SITE_PASS        | Credential to connect GMO Site API                                           |
| GMO_SHOP_ID          | Credential to connect GMO Shop API                                           |
| GMO_SHOP_PASS        | Credential to connect GMO Shop API                                           |
| GMO_3DS_VERSION      | 3DS API Version for credit card (only support value 1 / 2)                   |

```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email enggartivandi@outlook.com instead of using the issue tracker.

## Credits

-   [Enggar Tivandi](https://github.com/nekoding)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
