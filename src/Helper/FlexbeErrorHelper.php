<?php

namespace Segakgd\FlexbeApiClient\Helper;

use Segakgd\FlexbeApiClient\Enum\ErrorCodeEnum;
use Segakgd\FlexbeApiClient\Exception\InvalidApiKeyException;
use Segakgd\FlexbeApiClient\Exception\LimitExceededException;
use Segakgd\FlexbeApiClient\Exception\UndefinedActionException;
use Segakgd\FlexbeApiClient\Exception\UnknownErrorException;
use Segakgd\FlexbeApiClient\Client\Response\ErrorResponse;

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
