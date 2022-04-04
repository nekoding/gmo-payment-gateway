<?php

namespace Nekoding\GmoPaymentGateway;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Nekoding\GmoPaymentGateway\Core\Site\GmoShopApi useShopApi()
 * @method static \Nekoding\GmoPaymentGateway\Core\Site\GmoSiteApi useSiteApi()
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
