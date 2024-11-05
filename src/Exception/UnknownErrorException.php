<?php

namespace Segakgd\FlexbeApiClient\Exception;

use Exception;
use Segakgd\FlexbeApiClient\Enum\HttpCodeEnum;

class UnknownErrorException extends Exception
{
    private const MESSAGE = 'Unknown error.';

    public function __construct()
    {
        parent::__construct(
            message: static::MESSAGE,
            code: HttpCodeEnum::UnknownError->value,
        );
    }
}