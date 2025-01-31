<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class BaseException extends Exception
{
    protected $httpCode = Response::HTTP_SERVICE_UNAVAILABLE;

    public function __construct(string $message = 'Domain Related Issue.')
    {
        parent::__construct($message);
    }

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }
}
