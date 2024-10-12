<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Request;

use Segakgd\FlexbeApiClient\Enum\FlexbeActionEnum;
use Segakgd\FlexbeApiClient\Enum\HttpMethodsEnum;

readonly class Request
{
    public function __construct(
        private HttpMethodsEnum $method,
        private FlexbeActionEnum $action,
        private string $apiKey,
        private ?array $data = null,
    ) {
    }

    public function getMethod(): HttpMethodsEnum
    {
        return $this->method;
    }

    public function getAction(): FlexbeActionEnum
    {
        return $this->action;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getData(): ?array
    {
        return $this->data;
    }
}
