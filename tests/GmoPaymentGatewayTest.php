<?php

namespace Nekoding\GmoPaymentGateway\Tests;

use Nekoding\GmoPaymentGateway\GmoPaymentGateway;

class GmoPaymentGatewayTest extends TestCase
{

    public function test_initialize_package()
    {
        $gmo = new GmoPaymentGateway();
        $this->assertTrue($gmo->useShopApi()->creditCard()->entryTransaction([])->hasError());
    }

}