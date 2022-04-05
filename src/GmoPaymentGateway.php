<?php

namespace Nekoding\GmoPaymentGateway;

use Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard;
use Nekoding\GmoPaymentGateway\Contracts\Shop\GmoShopApi;
use Nekoding\GmoPaymentGateway\Contracts\Site\GmoSiteApi;
use Nekoding\GmoPaymentGateway\Core\Shop\GmoShopApi as GMOShopCore;
use Nekoding\GmoPaymentGateway\Core\Site\GmoSiteApi as GMOSiteCore;

class GmoPaymentGateway
{
    
    /**
     * Set package to interact with GMO site api
     *
     * @return GmoSiteApi
     */
    public function useSiteApi(): GmoSiteApi
    {
        return new GMOSiteCore();
    }
    
    /**
     * Set package to interact with GMO shop api
     *
     * @return GmoShopApi
     */
    public function useShopApi(): GmoShopApi
    {
        return new GMOShopCore();
    }
    
    /**
     * Use credit card as payment
     *
     * @return CreditCard
     */
    public function creditCard(): CreditCard
    {
        return $this->useShopApi()->creditCard();
    }
}
