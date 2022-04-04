<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop;

abstract class GmoShopApi implements Basic, Api3DSv1, Api3DSv2
{
    const HTTP_POST = 'POST';
    const HTTP_GET = 'GET';

    const TDSV1 = 1;
    const TDSV2 = 2;
    
    /**
     * Generate api credential
     *
     * @return array
     */
    public function apiCredentials(): array
    {
        return [
            'ShopID'    => config('gmo-payment-gateway.creds.shop_id') ?? env('GMO_SHOP_ID'),
            'ShopPass'  => config('gmo-payment-gateway.creds.shop_pass') ?? env('GMO_SHOP_PASS')
        ];
    }
}