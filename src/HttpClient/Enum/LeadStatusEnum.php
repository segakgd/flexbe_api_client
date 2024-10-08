<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Enum;

enum LeadStatusEnum: int
{
    case New = 0;
    case InWork = 1;
    case Success = 2;
    case Cancelled = 10;
    case Deleted = 11;
}
