<?php

namespace Nekoding\GmoPaymentGateway\Core\Shop;

use Closure;
use Illuminate\Support\Facades\Validator;
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
        $data = Validator::make($data, 
        [
            'OrderID'   => 'required|string|max:27',
            'JobCd'     => 'required|in:AUTH,CAPTURE',
            'Amount'    => 'required|numeric|digits_between:1,6',
            'Tax'       => 'nullable|numeric|digits_between:1,6',
        ])->validate();

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
        }

        $data = Validator::make($data, [
            'OrderID'       => 'required|string|max:27',
            'AccessID'      => 'required|string|max:32',
            'AccessPass'    => 'required|string|max:32',
            'RetURL'        => 'required|string|max:256|url',
            'ClientField1'  => 'nullable|string|max:100',
            'ClientField2'  => 'nullable|string|max:100',
            'ClientField3'  => 'nullable|string|max:100',
            'DocomoDisp1'   => 'nullable|string|max:40',
            'DocomoDisp2'   => 'nullable|string|max:40',
            'PaymentTermSec'=> 'nullable|numeric|max:5',
            'DispShopName'  => 'nullable|string|max:32',
            'DispPhoneNumber'   => 'nullable|string|max:13',
            'DispMailAddress'   => 'nullable|string|max:96',
            'DispShopUrl'   => 'nullable|string|max:96',
        ])->validate();

        if ($this->response) {
            return new Response(
                $this->request(self::EXEC_TRAN, array_merge($data, $this->getApiCredential())), $this->response->getResult()
            );
        }

        return new Response($this->request(self::EXEC_TRAN, array_merge($data, $this->getApiCredential())));
    }

}