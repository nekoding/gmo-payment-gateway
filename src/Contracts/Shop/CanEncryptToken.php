<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop;

use Nekoding\GmoPaymentGateway\Contracts\Encryption\Token;
use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;

interface CanEncryptToken
{

    public function getCreditCardToken(Token $token): ResponseParser;

}