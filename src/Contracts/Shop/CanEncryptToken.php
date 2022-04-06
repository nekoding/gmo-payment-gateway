<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop;

use Nekoding\GmoPaymentGateway\Contracts\Encryption\Token;
use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;

interface CanEncryptToken
{
    
    /**
     * Get credit card token from GMO API
     *
     * @param  \Nekoding\GmoPaymentGateway\Contracts\Encryption\Token  $token
     * @return ResponseParser
     */
    public function getCreditCardToken(Token $token): ResponseParser;

}