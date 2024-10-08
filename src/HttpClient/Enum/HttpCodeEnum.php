<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Enum;

enum HttpCodeEnum: int
{
    case BadRequest = 400;
    case TooManyRequests = 429;
    case Forbidden = 403;
    case UnknownError = 520;
}
