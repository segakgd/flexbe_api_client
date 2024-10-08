<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Exception\Http;

use Exception;
use Segakgd\FlexbeApiClient\HttpClient\Enum\HttpCodeEnum;

class LimitExceededException extends Exception
{
    private const MESSAGE = 'Request limit exceeded.';

    public function __construct()
    {
        parent::__construct(
            message: static::MESSAGE,
            code: HttpCodeEnum::TooManyRequests->value,
        );
    }
}
