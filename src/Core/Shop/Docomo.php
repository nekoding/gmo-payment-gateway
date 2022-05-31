<?php

namespace Nekoding\GmoPaymentGateway\Core\Shop;

use Closure;
use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;
use Nekoding\GmoPaymentGateway\Contracts\Shop\Docomo as ShopDocomo;
use Nekoding\GmoPaymentGateway\Core\InitApiCredentials;
use Nekoding\GmoPaymentGateway\Core\Response;
use Nekoding\GmoPaymentGateway\Core\Traits\HttpClient;

class Docomo implements ShopDocomo
{

    use InitApiCredentials;
    use HttpClient;

    /**
     * @var Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser $response
     */
    private $response;

    public function entryTransaction(array $data, ?Closure $callback = null): ResponseParser
    {
        if ($callback) {
            $this->response = new Response(
                $this->request(self::ENTRY_TRAN, array_merge($data, $this->getApiCredential()))
            );

            return $callback($this);
        }

        return new Response($this->request(self::ENTRY_TRAN, array_merge($data, $this->getApiCredential())));
    }

    public function execTransaction(array $data): ResponseParser
    {
        if ($this->response) {
            $data = array_merge($data, $this->response->getResult());
            return new Response(
                $this->request(self::EXEC_TRAN, array_merge($data, $this->apiCredential)), $this->response->getResult()
            );
        }

        return new Response($this->request(self::EXEC_TRAN, array_merge($data, $this->apiCredential)));
    }

}