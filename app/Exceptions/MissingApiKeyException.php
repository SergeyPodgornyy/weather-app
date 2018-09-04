<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MissingApiKeyException extends HttpException
{
    public function __construct(int $responseCode = Response::HTTP_BAD_REQUEST)
    {
        $message = 'Missing API key to access OpenWeather API';

        parent::__construct($responseCode, $message);
    }
}
