<?php

namespace Nekoding\GmoPaymentGateway\Core\Shop;

use Closure;
use Nekoding\GmoPaymentGateway\Contracts\Encryption\Token;
use Nekoding\GmoPaymentGateway\Contracts\Shop\CreditCard as CreditCardContract;
use Nekoding\GmoPaymentGateway\Core\Traits\HttpClient;
use Nekoding\GmoPaymentGateway\Core\Response;
use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;
use Nekoding\GmoPaymentGateway\Core\GMOConst;
use Nekoding\GmoPaymentGateway\Core\Shop\Encryption\Response as EncryptionResponse;
use Nekoding\GmoPaymentGateway\Exceptions\ApiException;

final class CreditCard extends CreditCardContract
{
    use HttpClient;

    /**
     * @var Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser $response
     */
    private $response;

    public function entryTransaction(array $data, ?Closure $callback = null): ResponseParser
    {
        if ($callback) {
            $this->response = new Response($this->request(self::ENTRY_TRAN, array_merge($data, $this->apiCredential)));
            return $callback($this);
        }

        return new Response($this->request(self::ENTRY_TRAN, array_merge($data, $this->apiCredential)));
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

    public function alterTransaction(array $data): ResponseParser
    {
        return new Response($this->request(self::ALTER_TRAN, array_merge($data, $this->apiCredential)));
    }

    public function changeTransaction(array $data): ResponseParser
    {
        return new Response($this->request(self::CHANGE_TRAN, array_merge($data, $this->apiCredential)));
    }

    public function searchTrade(array $data): ResponseParser
    {
        return new Response($this->request(self::SEARCH_TRADE, array_merge($data, $this->apiCredential)));
    }

    public function secureTrans(array $data): ResponseParser
    {

        if (config('gmo-payment-gateway.secure.3dversion') ?? env('GMO_3DS_VERSION') == self::TDSV1) {
            return new Response($this->request(self::SECURE_TRANS, array_merge($data, $this->apiCredential)));
        }

        if (config('gmo-payment-gateway.secure.3dversion') ?? env('GMO_3DS_VERSION') == self::TDSV2) {
            return new Response($this->request(self::TDS2_SECURE_TRANS, array_merge($data, $this->apiCredential)));
        }

        throw new ApiException("This method only support 3DS v1 and v2, please check your configuration.");
    }

    public function tds2Auth(array $data): ResponseParser
    {
        if (config('gmo-payment-gateway.secure.3dversion') ?? env('GMO_3DS_VERSION') == self::TDSV2) {
            return new Response($this->request(self::TDS2_AUTH, array_merge($data, $this->apiCredential)));
        }

        throw new ApiException("This method only support 3DS v2, please check your configuration.");
    }

    public function tds2AppAuth(array $data): ResponseParser
    {
        if (config('gmo-payment-gateway.secure.3dversion') ?? env('GMO_3DS_VERSION') == self::TDSV2) {
            return new Response($this->request(self::TDS2_APP_AUTH, array_merge($data, $this->apiCredential)));
        }

        throw new ApiException("This method only support 3DS v2, please check your configuration.");
    }

    public function tds2GetResult(array $data): ResponseParser
    {
        if (config('gmo-payment-gateway.secure.3dversion') ?? env('GMO_3DS_VERSION') == self::TDSV2) {
            return new Response($this->request(self::TDS2_RESULT, array_merge($data, $this->apiCredential)));
        }

        throw new ApiException("This method only support 3DS v2, please check your configuration.");
    }

    public function tds2GetAppResult(array $data): ResponseParser
    {
        if (config('gmo-payment-gateway.secure.3dversion') ?? env('GMO_3DS_VERSION') == self::TDSV2) {
            return new Response($this->request(self::TDS2_APP_RESULT, array_merge($data, $this->apiCredential)));
        }

        throw new ApiException("This method only support 3DS v2, please check your configuration.");
    }

    public function getCreditCardToken(Token $token): ResponseParser
    {
        $data = [
            'Encrypted' => $token->getEncryptionCreditCard(),
            'KeyHash'   => config('gmo-payment-gateway.key_hash') ?? env('GMO_PUBLIC_KEY_HASH'),
        ];

        return new EncryptionResponse($this->post(Token::GET_TOKEN_URI, array_merge($data, $this->apiCredential)));
    }
}
