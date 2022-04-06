<?php

namespace Nekoding\GmoPaymentGateway\Core\Shop\Encryption;

use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;
use Nekoding\GmoPaymentGateway\Core\Response as CoreResponse;
use GuzzleHttp\Psr7\Response as Psr7Response;

class Response extends CoreResponse implements ResponseParser
{    
    /**
     * create response data
     *
     * @param  \GuzzleHttp\Psr7\Response $response
     * @return void
     */
    protected function createResponseData(Psr7Response $response): void
    {
        $this->httpStatusCode = $response->getStatusCode();
        if (!$this->checkApiHasErrorCode((string) $response->getBody())) {
            $this->responseData = (string) $response->getBody();
        }
    }
    
    /**
     * Check if API return error code
     *
     * @param  string $response
     * @return bool
     */
    protected function checkApiHasErrorCode(string $response): bool
    {
        $result = json_decode($response, true);
        $check = $result['resultCode'][0] != 0; // 0000

        if ($check) {
            $this->hasError = true;
            $this->errorMessages = $this->parseErrorMessages($result['resultCode']);

            return true;
        }

        return false;
    }

   /**
     * Parsing error message
     *
     * @param  array|string $errorResponse
     * @return array
     */
    public function parseErrorMessages($errorResponse): array
    {
        $errorMessages = [];
        foreach ($errorResponse as $errCode) {
            $errorMessages[$errCode] = $this->getErrorMessage($errCode);
        }

        return $errorMessages;
    }
    
    /**
     * Get result data
     *
     * @return array
     */
    public function getResult(): array
    {
        $result = json_decode($this->responseData, true);
        return $result;
    }
}