<?php

namespace Nekoding\GmoPaymentGateway\Core\Traits;

use Nekoding\GmoPaymentGateway\Core\ErrorMessageCollection;

trait ErrorParser
{
    public function parseErrorMessages(string $errorResponse): array
    {
        parse_str($errorResponse, $res);
        $errorInfoCode = explode('|', $res['ErrInfo']);

        $errorMessages = [];
        foreach ($errorInfoCode as $errCode) {
            $errorMessages[$errCode] = $this->getErrorMessage($errCode);
        }

        return $errorMessages;
    }

    private function getErrorMessage(string $key): string
    {
        if (array_key_exists($key, ErrorMessageCollection::getErrorMessages())) {
            return ErrorMessageCollection::getErrorMessages()[$key];
        }

        return '原因不明のエラーが発生しました。';
    }
}
