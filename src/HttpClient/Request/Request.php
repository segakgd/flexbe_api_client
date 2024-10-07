<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Request;

use Segakgd\FlexbeApiClient\HttpClient\Enum\HttpMethodsEnum;

class Request
{
    private ?array $data = null;

    private string $apiKey;

    private HttpMethodsEnum $method;

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(?array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function getMethod(): HttpMethodsEnum
    {
        return $this->method;
    }

    public function setMethod(HttpMethodsEnum $method): self
    {
        $this->method = $method;

        return $this;
    }
}
