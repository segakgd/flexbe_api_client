<?php

namespace Segakgd\FlexbeApiClient\Exception\Http;

use Exception;
use Segakgd\FlexbeApiClient\Enum\HttpCodeEnum;

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