<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Encryption;

interface Token
{

    /**
     * Endpoint get token
     */
    const GET_TOKEN_URI = '/ext/api/credit/getToken';
    
        
    /**
     * Encrypt data
     *
     * @param  string|array $data
     * @return self
     */
    public static function encrypt($data): self;

        
    /**
     * Get encruption credit card detail
     *
     * @return string
     */
    public function getEncryptionCreditCard(): string;

}