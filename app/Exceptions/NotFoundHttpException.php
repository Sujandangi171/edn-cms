<?php

namespace App\Exceptions;

use Exception;

class NotFoundHttpException extends Exception
{
    public function __construct(string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct(404, $message, $previous, $headers, $code);
    }
}
