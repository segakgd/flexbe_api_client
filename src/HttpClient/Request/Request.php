<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Request;

use Segakgd\FlexbeApiClient\Enum\FlexbeActionEnum;

readonly class Request
{
    public function __construct(
        private FlexbeActionEnum $action,
        private string $apiKey,
        private ?array $data = null,
    ) {
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
