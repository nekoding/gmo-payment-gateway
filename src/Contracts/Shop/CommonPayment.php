<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop;

use Closure;
use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;

interface CommonPayment
{
    public function entryTransaction(array $data, Closure $callback = null): ResponseParser;

    public function execTransaction(array $data): ResponseParser;
}