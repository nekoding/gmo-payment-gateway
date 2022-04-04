<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Response;

interface ResponseParser
{

    public static function parse($response): self;

    public function hasError(): bool;

    public function getErrorMessages(): array;

    public function getHttpStatusCode(): int;

    public function getResult(): array;

}