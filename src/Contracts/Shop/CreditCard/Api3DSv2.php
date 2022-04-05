<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard;

use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;

interface Api3DSv2 
{

    // Api Endpoint
    const TDS2_AUTH = '/payment/Tds2Auth.idPass';
    const TDS2_RESULT = '/payment/Tds2Result.idPass';
    const TDS2_APP_AUTH= '/payment/Tds2AuthApp.idPass';
    const TDS2_APP_RESULT = '/payment/Tds2ResultApp.idPass';
    const TDS2_SECURE_TRANS = '/payment/SecureTran2.idPass';
    
    /**
     * Performs 3DS 2.0 authentication
     *
     * @param  array $data
     * @return ResponseParser
     * @throws \Nekoding\GmoPaymentGateway\Exceptions\ApiException
     * @see https://docs.mul-pay.jp/payment/credit/api3ds2#tds2auth
     */
    public function tds2Auth(array $data): ResponseParser;
    
    /**
     * Get the final certification result of 3DS2.0 certification.
     *
     * @param  array $data
     * @return ResponseParser
     * @throws \Nekoding\GmoPaymentGateway\Exceptions\ApiException
     * @see https://docs.mul-pay.jp/payment/credit/api3ds2#tds2result
     */
    public function tds2GetResult(array $data): ResponseParser;
    
    /**
     * Performs 3DS 2.0 authentication (mobile application)
     *
     * @param  array $data
     * @return ResponseParser
     * @throws \Nekoding\GmoPaymentGateway\Exceptions\ApiException
     * @see https://docs.mul-pay.jp/payment/credit/api3ds2#tds2authapp
     */
    public function tds2AppAuth(array $data): ResponseParser;
    
    /**
     * Get the final certification result of 3DS2.0 certification (mobile application)
     *
     * @param  array $data
     * @return ResponseParser
     * @throws \Nekoding\GmoPaymentGateway\Exceptions\ApiException
     * @see https://docs.mul-pay.jp/payment/credit/api3ds2#tds2resultapp
     */
    public function tds2GetAppResult(array $data): ResponseParser;
}