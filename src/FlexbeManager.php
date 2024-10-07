<?php

namespace Segakgd\FlexbeApiClient;

use Segakgd\FlexbeApiClient\Dto\ClientFlexbeDto;
use Segakgd\FlexbeApiClient\HttpClient\Enum\HttpMethodsEnum;
use Segakgd\FlexbeApiClient\HttpClient\HttpService;
use Segakgd\FlexbeApiClient\HttpClient\Request\Request;

readonly class FlexbeManager
{
    public function getLeads(ClientFlexbeDto $clientFlexbeDto): void
    {
        $request = $this->buildRequest(
            method: HttpMethodsEnum::Get,
            apiKey: $clientFlexbeDto->getApiKey(),
        );

        (new HttpService())->request($request);
    }

    public function changeLead(ClientFlexbeDto $clientFlexbeDto): void
    {
        $request = $this->buildRequest(
            method: HttpMethodsEnum::Post,
            apiKey: $clientFlexbeDto->getApiKey(),
        );

        (new HttpService())->request($request);
    }

    private function buildRequest(
        HttpMethodsEnum $method,
        string $apiKey,
        ?array $data = null,
    ): Request {
        return (new Request())
            ->setMethod($method)
            ->setApiKey($apiKey)
            ->setData($data);
    }
}
