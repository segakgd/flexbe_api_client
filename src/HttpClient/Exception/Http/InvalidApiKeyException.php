<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Exception\Http;

use Exception;
use Segakgd\FlexbeApiClient\HttpClient\Enum\HttpCodeEnum;

class InvalidApiKeyException extends Exception
{
    private const MESSAGE = 'Invalid api key.';

    public function __construct()
    {
        parent::__construct(
            message: static::MESSAGE,
            code: HttpCodeEnum::Forbidden->value,
        );
    }
}
