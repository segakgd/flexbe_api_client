<?php

namespace Segakgd\FlexbeApiClient\Exception;

use Exception;
use Segakgd\FlexbeApiClient\Enum\HttpCodeEnum;

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
