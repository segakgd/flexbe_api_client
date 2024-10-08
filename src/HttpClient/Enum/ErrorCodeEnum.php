<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Enum;

enum ErrorCodeEnum: int
{
    case InvalidApiKey = 0;
    case LimitExceeded = 1;
    case UndefinedAction = 2;
}
