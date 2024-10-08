<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Exception\Http;

use Exception;
use Segakgd\FlexbeApiClient\HttpClient\Enum\HttpCodeEnum;

class UndefinedActionException extends Exception
{
    private const MESSAGE = 'A non-existent action.';

    public function __construct()
    {
        parent::__construct(
            message: static::MESSAGE,
            code: HttpCodeEnum::BadRequest->value,
        );
    }
}