# GMOPG Package for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nekoding/gmo-payment-gateway.svg?style=flat-square)](https://packagist.org/packages/nekoding/gmo-payment-gateway)
[![Total Downloads](https://img.shields.io/packagist/dt/nekoding/gmo-payment-gateway.svg?style=flat-square)](https://packagist.org/packages/nekoding/gmo-payment-gateway)

Simple package to interact GMOPG API for laravel project

## Installation

You can install the package via composer:

```bash
composer require nekoding/gmo-payment-gateway
```

Publish configuration file with  

```bash
php artisan vendor:publish --provider="Nekoding\GmoPaymentGateway\GmoPaymentGatewayServiceProvider"
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

// Or you can use facade like this too
\Nekoding\GmoPaymentGateway\GmoPaymentGatewayFacade::useShopApi();
\Nekoding\GmoPaymentGateway\GmoPaymentGatewayFacade::useSiteApi();
\Nekoding\GmoPaymentGateway\GmoPaymentGatewayFacade::creditCard();

// If you want execution CreditCard EntryTran and CreditCard ExecTran at once 
// You can use CreditCard entryTransaction callback like this
use Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard\Basic;
use \Nekoding\GmoPaymentGateway\GmoPaymentGatewayFacade;

$data = ['OrderID' => uniqid(), 'JobCd' => 'AUTH', 'Amount' => 1000, 'Method' => '', 'Token' => ''];
$response = GmoPaymentGatewayFacade::creditCard()
            ->entryTransaction($data, function (Basic $gmo) use (&$data) {
                return $gmo->execTransaction($data);
            });

$response->getResult(); // it will return response from entry transaction and exec transaction process

// example response :
[
  "ACS" => "0"
  "OrderID" => "xxxx"
  "Forward" => "xxx"
  "Method" => "1"
  "PayTimes" => ""
  "Approve" => "xxx"
  "TranID" => "xxxx"
  "TranDate" => "xxxxx"
  "CheckString" => "xxxxx",
  "AccessID" => "xxxxx",
  "AccessPass" => "xxxx"
]
```

### Configuration
You can change api credential via `.env` or via `config/config.php`  

| ENV Key              | Description                                                                  |
|----------------------|------------------------------------------------------------------------------|
| GMO_API_SANDBOX_MODE | If true package will use sandbox endpoint instead production endpoint        |
| GMO_SITE_ID          | Credential to connect GMO Site API                                           |
| GMO_SITE_PASS        | Credential to connect GMO Site API                                           |
| GMO_SHOP_ID          | Credential to connect GMO Shop API                                           |
| GMO_SHOP_PASS        | Credential to connect GMO Shop API                                           |
| GMO_3DS_VERSION      | 3DS API Version for credit card (only support value 1 / 2)                   |
| GMO_API_TIMEOUT      | Determine API Timeout (default: 2s)                                          |


### Supported API 

- [x] SiteAPI  
- [x] ShopAPI - Credit card payment


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
