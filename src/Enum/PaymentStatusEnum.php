<?php

namespace Segakgd\FlexbeApiClient\Enum;

enum PaymentStatusEnum: int
{
    case Pending = 0;
    case InProcess = 1;
    case Paid = 2;
    case Failed = 3;
}
