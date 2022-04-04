<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Site;

abstract class GmoSiteApi implements GmoMembership, GmoCreditCard
{
    const HTTP_POST = 'POST';
    const HTTP_GET = 'GET';

    public function apiCredentials()
    {
        return [
            'SiteID'    => config('gmo-payment-gateway.creds.site_id') ?? env('GMO_SITE_ID'),
            'SitePass'  => config('gmo-payment-gateway.creds.site_pass') ?? env('GMO_SITE_PASS')
        ];
    }
}
