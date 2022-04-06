<?php

namespace Nekoding\GmoPaymentGateway\Core\Traits;

use Nekoding\GmoPaymentGateway\Core\ErrorMessageCollection;

trait ErrorParser
{    
    /**
     * Parsing error message
     *
     * @param  array|string $errorResponse
     * @return array
     */
    public function parseErrorMessages($errorResponse): array
    {
        parse_str($errorResponse, $res);
        $errorInfoCode = explode('|', $res['ErrInfo']);

        $errorMessages = [];
        foreach ($errorInfoCode as $errCode) {
            $errorMessages[$errCode] = $this->getErrorMessage($errCode);
        }

        return $errorMessages;
    }
    
    /**
     * Get error message
     *
     * @param  string $key
     * @return string
     */
    protected function getErrorMessage(string $key): string
    {
        if (array_key_exists($key, ErrorMessageCollection::getErrorMessages())) {
            return ErrorMessageCollection::getErrorMessages()[$key];
        }

        return '原因不明のエラーが発生しました。';
    }
}
