<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard;

use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;

interface Api3DSv1 
{

    // Api endpoint
    const SECURE_TRANS = '/payment/SecureTran.idPass';
    
    /**
     * Perform secure transaction
     *
     * @param  array $data
     * @return ResponseParser
     * @throws \Nekoding\GmoPaymentGateway\Exceptions\ApiException
     * @see https://docs.mul-pay.jp/payment/credit/api3ds1#securetran
     */
    public function secureTrans(array $data): ResponseParser;

}