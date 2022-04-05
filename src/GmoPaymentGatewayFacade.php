<?php

namespace Nekoding\GmoPaymentGateway;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Nekoding\GmoPaymentGateway\Contracts\Shop\GmoShopApi useShopApi()
 * @method static \Nekoding\GmoPaymentGateway\Contracts\Site\GmoSiteApi useSiteApi()
 * @method static \Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard creditCard()
 * 
 * @see \Nekoding\GmoPaymentGateway\Skeleton\SkeletonClass
 */
class GmoPaymentGatewayFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'gmo-payment-gateway';
    }
}
