<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Helper;

use Segakgd\FlexbeApiClient\HttpClient\Enum\ErrorCodeEnum;

class FlexbeErrorHelper
{
    public static function getErrorMessage(ErrorCodeEnum $errorCode): string
    {
        return match ($errorCode) {
            ErrorCodeEnum::InvalidApiKey => 'Invalid api key',
            ErrorCodeEnum::LimitExceeded => 'Request limit exceeded',
            ErrorCodeEnum::UndefinedAction => 'A non-existent action',
        };
    }
}