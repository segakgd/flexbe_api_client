<?php

namespace Segakgd\FlexbeApiClient\Exception;

use Exception;

class BadRequestException extends Exception
{
    public function __construct()
    {
        parent::__construct("Bad request");
    }
}
