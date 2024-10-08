<?php

namespace Segakgd\FlexbeApiClient\Dto;

readonly class FlexbeApiClientDto
{
    public function __construct(
        private string $domain,
        private string $apiKey,
    ) {
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}