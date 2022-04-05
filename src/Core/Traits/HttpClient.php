<?php

namespace Nekoding\GmoPaymentGateway\Core\Traits;

use GuzzleHttp\Client;
use Nekoding\GmoPaymentGateway\Core\GMOConst;
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
            'base_uri'  => config('gmo-payment-gateway.is_sandbox') ?? env('GMO_API_SANDBOX_MODE', true) ? $this->sandboxEndpoint : $this->prodEndpoint,
            'timeout'   => config('gmo-payment-gateway.timeout') ?? env('GMO_API_TIMEOUT', 2),
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