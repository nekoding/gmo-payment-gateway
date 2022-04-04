<?php

namespace Nekoding\GmoPaymentGateway\Exceptions;

use Exception;

class HttpMethodException extends Exception
{
    public static function withMessage(string $message)
    {
        return new self($message);
    }
}