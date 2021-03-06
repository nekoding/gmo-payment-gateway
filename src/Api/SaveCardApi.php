<?php

namespace msng\GmoPaymentGateway\Api;

use msng\GmoPaymentGateway\Entities\Requests\SaveCardRequest;
use msng\GmoPaymentGateway\Entities\Responses\SaveCardResponse;

class SaveCardApi extends Api
{
    protected $endPoint = '/payment/SaveCard.idPass';

    protected $requestClass = SaveCardRequest::class;

    protected $responseClass = SaveCardResponse::class;
}
