<?php

namespace Segakgd\FlexbeApiClient\Exception;

use Exception;
use Segakgd\FlexbeApiClient\Enum\HttpMethodsEnum;

class InvalidMethodException extends Exception
{
    public function __construct(HttpMethodsEnum $method)
    {
        parent::__construct("The $method->value method is invalid");
    }
}
