<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Response;

interface ResponseParser
{
    
    /**
     * Parse response data
     *
     * @param  mixed $response
     * @return self
     */
    public static function parse($response): self;
    
    /**
     * Check if response has error code
     *
     * @return bool
     */
    public function hasError(): bool;
    
    /**
     * Print error message
     *
     * @return array
     */
    public function getErrorMessages(): array;
    
    /**
     * Print Http Status Code
     *
     * @return int
     */
    public function getHttpStatusCode(): int;
    
    /**
     * Get response data
     *
     * @return array
     */
    public function getResult(): array;

}