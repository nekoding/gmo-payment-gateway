<?php

namespace Nekoding\GmoPaymentGateway\Core;

use Illuminate\Support\Facades\Validator;
use Nekoding\GmoPaymentGateway\Exceptions\ApiException;

trait InitApiCredentials
{
    /**
     * API Credential to connect GMO API
     *
     * @var array
     */
    protected $apiCredential = [];


    public function loadCreds(array $apiCredential): self
    {
        $this->apiCredential = $apiCredential;

        return $this;
    }
    
    /**
     * Get API credential
     *
     * @return array
     * @throws \Nekoding\GmoPaymentGateway\Exceptions\ApiException
     */
    public function getApiCredential(): array
    {
        return Validator::make($this->apiCredential, [
            'ShopID'    => 'required',
            'ShopPass'  => 'required'
        ])->validate();
    }

}