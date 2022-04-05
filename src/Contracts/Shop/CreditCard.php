<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop;

use Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard\Api3DSv1;
use Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard\Api3DSv2;
use Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard\Basic;

abstract class CreditCard implements Api3DSv1, Api3DSv2, Basic
{
    const TDSV1 = 1;
    const TDSV2 = 2;

    protected $apiCredential = [];

    public function __construct(array $apiCredential)
    {
        $this->apiCredential = $apiCredential;
    }

    public function getApiCredential(): array
    {
        return $this->apiCredential;
    }
}