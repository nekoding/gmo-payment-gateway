<?php

namespace Nekoding\GmoPaymentGateway\Tests;

use Nekoding\GmoPaymentGateway\Contracts\Shop\CommonPayment;
use Nekoding\GmoPaymentGateway\Core\Shop\Encryption\CreditCardToken;
use Nekoding\GmoPaymentGateway\Core\Shop\Encryption\CreditCardTokenizer;
use Nekoding\GmoPaymentGateway\GmoPaymentGateway;

class GmoPaymentGatewayTest extends TestCase
{

    public function test_initialize_package()
    {
        $gmo = new GmoPaymentGateway();
        $this->assertTrue($gmo->useShopApi()->creditCard()->entryTransaction([])->hasError());
    }

}