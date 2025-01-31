<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

final class UnauthorizedUserException extends BaseException
{
    public function __construct(string $message = 'The user is not authorized to access this resource or perform this action')
    {
        $this->httpCode = Response::HTTP_UNAUTHORIZED;
        parent::__construct($message);
    }
}
