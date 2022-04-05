<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Site;

abstract class GmoSiteApi implements GmoMembership, GmoCreditCard
{        
    /**
     * Generate credential to connect GMO Site API
     *
     * @return array
     */
    public function apiCredentials(): array
    {
        return [
            'SiteID'    => config('gmo-payment-gateway.creds.site_id') ?? env('GMO_SITE_ID'),
            'SitePass'  => config('gmo-payment-gateway.creds.site_pass') ?? env('GMO_SITE_PASS')
        ];
    }
}
