<?php

namespace Segakgd\FlexbeApiClient\Helper;

use Segakgd\FlexbeApiClient\Enum\ErrorCodeEnum;
use Segakgd\FlexbeApiClient\Exception\Http\InvalidApiKeyException;
use Segakgd\FlexbeApiClient\Exception\Http\LimitExceededException;
use Segakgd\FlexbeApiClient\Exception\Http\UndefinedActionException;
use Segakgd\FlexbeApiClient\Exception\Http\UnknownErrorException;
use Segakgd\FlexbeApiClient\HttpClient\Response\ErrorResponse;

class FlexbeErrorHelper
{
    /**
     * @throws UndefinedActionException
     * @throws UnknownErrorException
     * @throws InvalidApiKeyException
     * @throws LimitExceededException
     */
    public static function throwByError(ErrorResponse $error): void
    {
        throw match ($error->getCode()) {
            ErrorCodeEnum::InvalidApiKey => new InvalidApiKeyException(),
            ErrorCodeEnum::LimitExceeded => new LimitExceededException(),
            ErrorCodeEnum::UndefinedAction => new UndefinedActionException(),
            default => new UnknownErrorException(),
        };
    }
}
