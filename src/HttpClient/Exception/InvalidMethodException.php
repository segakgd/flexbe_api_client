<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Exception;

use Exception;
use Segakgd\FlexbeApiClient\HttpClient\Enum\HttpMethodsEnum;

class InvalidMethodException extends Exception
{
    public function __construct(HttpMethodsEnum $method)
    {
        parent::__construct("The $method->value method is invalid");
    }
}
