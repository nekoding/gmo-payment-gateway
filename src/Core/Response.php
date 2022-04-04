<?php

namespace Nekoding\GmoPaymentGateway\Core;

use GuzzleHttp\Psr7\Response as Psr7Response;
use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;
use Nekoding\GmoPaymentGateway\Core\Traits\ErrorParser;

class Response implements ResponseParser
{

    use ErrorParser;

    private int $httpStatusCode;

    private $body;

    private bool $hasError = false;

    private $responseData;

    private $errorMessages = [];

    public function __construct($result)
    {
        $this->createResponseData($result);
    }

    public static function parse($response): ResponseParser
    {
        return new self($response);
    }

    public function hasError(): bool
    {
        return $this->hasError;
    }

    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public function getResult(): array
    {
        parse_str($this->responseData, $result);
        return $result;
    }

    private function createResponseData(Psr7Response $response): void
    {
        $this->httpStatusCode = $response->getStatusCode();
        if (!$this->checkApiHasErrorCode((string) $response->getBody())) {
            $this->responseData = (string) $response->getBody();
        }
    }

    private function checkApiHasErrorCode(string $response): bool
    {
        $check = str_contains($response, 'ErrCode') && str_contains($response, 'ErrInfo');

        if ($check) {
            $this->hasError = true;
            $this->errorMessages = $this->parseErrorMessages((string) $response);

            return true;
        }

        return false;
    }

}