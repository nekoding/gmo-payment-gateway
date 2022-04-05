<?php

namespace Nekoding\GmoPaymentGateway\Core\Shop;

use Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard;
use Nekoding\GmoPaymentGateway\Contracts\Shop\GmoShopApi as GmoShopContracts;
use Nekoding\GmoPaymentGateway\Core\Shop\CreditCard as ShopCreditCard;

final class GmoShopApi implements GmoShopContracts
{
    /**
     * Generate api credential
     *
     * @return array
     */
    private function apiCredentials(): array
    {
        return [
            'ShopID'    => config('gmo-payment-gateway.creds.shop_id') ?? env('GMO_SHOP_ID'),
            'ShopPass'  => config('gmo-payment-gateway.creds.shop_pass') ?? env('GMO_SHOP_PASS')
        ];
    }
    
    public function creditCard(): CreditCard
    {
        return new ShopCreditCard($this->apiCredentials());
    }

}