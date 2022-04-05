<?php

namespace Nekoding\GmoPaymentGateway\Core\Traits;

use GuzzleHttp\Client;
use Nekoding\GmoPaymentGateway\Core\GMOConst;
use Nekoding\GmoPaymentGateway\Exceptions\HttpMethodException;

trait HttpClient
{
    
    /**
     * GMO Production endpoint
     *
     * @var string
     */
    private $prodEndpoint = 'https://p01.mul-pay.jp';
    
    /**
     * GMO Sandbox endpoint
     *
     * @var string
     */
    private $sandboxEndpoint = 'https://pt01.mul-pay.jp';

    /**
     * @var \GuzzleHttp\Client $httpClient
     */
    private $httpClient;
        
    /**
     * Initalize Http Client
     *
     * @return Client
     */
    protected function initHttpClient(): Client
    {
        if (!$this->httpClient) {
            $this->httpClient = new Client([
                'base_uri'  => config('gmo-payment-gateway.is_sandbox') ?? env('GMO_API_SANDBOX_MODE', true) ? $this->sandboxEndpoint : $this->prodEndpoint,
                'timeout'   => config('gmo-payment-gateway.timeout') ?? env('GMO_API_TIMEOUT', 2),
            ]);
        }

        return $this->httpClient;
    }

    /**
     * Send HTTP Post Request
     *
     * @param  string $url
     * @param  array $body
     */
    public function post(string $url, array $body)
    {
        return $this->initHttpClient()->post($url, [
            'form_params' => $body
        ]);
    }
    
    /**
     * Send HTTP Get Request
     *
     * @param  string $url
     * @param  array $body
     */
    public function get(string $url, array $body)
    {
        return $this->initHttpClient()->get($url, [
            'query' => $body
        ]);
    }
    
    /**
     * Send HTTP Request
     *
     * @param  string $url
     * @param  array $body
     * @param  string $httpMethod
     * @throws \Nekoding\GmoPaymentGateway\Exceptions\HttpMethodException
     */
    public function request(string $url, array $body, string $httpMethod = 'POST')
    {
        if ($httpMethod == GMOConst::HTTP_POST) {
            return $this->post($url, $body);
        }

        if ($httpMethod == GMOConst::HTTP_GET) {
            return $this->get($url, $body);
        }

        throw HttpMethodException::withMessage("HTTP Not supported for this endpoint");
    }

}