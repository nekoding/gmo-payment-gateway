<?php

namespace Nekoding\GmoPaymentGateway\Core\Traits;

use GuzzleHttp\Client;
use Nekoding\GmoPaymentGateway\Exceptions\HttpMethodException;

trait HttpClient
{

    private $prodEndpoint = 'https://p01.mul-pay.jp';

    private $sandboxEndpoint = 'https://pt01.mul-pay.jp';

    protected $httpClient;

    protected $httpClientConfig;

    public function initHttpClient()
    {
        $this->httpClient = new Client([
            'base_uri'  => config('gmo-payment-gateway.is_sandbox') ?? env('GMO_API_MODE') ? $this->sandboxEndpoint : $this->prodEndpoint,
            'timeout'   => 2.0,
        ]);
    }

    public function post(string $url, array $body)
    {
        if (!$this->httpClient) {
            $this->initHttpClient();
        }

        return $this->httpClient->post($url, [
            'form_params' => $body
        ]);
    }

    public function get(string $url, array $body)
    {
        if (!$this->httpClient) {
            $this->initHttpClient();
        }

        return $this->httpClient->get($url, [
            'query' => $body
        ]);
    }

    public function request(string $httpMethod = 'GET', string $url, array $body, array $requiredBody = [])
    {
        if ($httpMethod == 'POST') {
            return $this->post($url, array_merge($body, $requiredBody));
        }

        if ($httpMethod == 'GET') {
            return $this->get($url, array_merge($body, $requiredBody));
        }

        throw HttpMethodException::withMessage("HTTP Not supported for this endpoint");
    }

}