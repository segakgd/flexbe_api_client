<?php

namespace Segakgd\FlexbeApiClient;

use Segakgd\FlexbeApiClient\Dto\FlexbeApiClientDto;
use Segakgd\FlexbeApiClient\HttpClient\Enum\FlexbeActionEnum;
use Segakgd\FlexbeApiClient\HttpClient\Enum\HttpMethodsEnum;
use Segakgd\FlexbeApiClient\HttpClient\Exception\BadRequestException;
use Segakgd\FlexbeApiClient\HttpClient\Exception\InvalidMethodException;
use Segakgd\FlexbeApiClient\HttpClient\HttpService;
use Segakgd\FlexbeApiClient\HttpClient\Request\Request;
use Segakgd\FlexbeApiClient\HttpClient\Response\Response;

readonly class FlexbeApiManager
{
    private HttpService $httpService;

    public function __construct()
    {
        $this->httpService = new HttpService();
    }

    /**
     * @throws InvalidMethodException
     * @throws BadRequestException
     */
    public function getLeads(FlexbeApiClientDto $clientFlexbeDto): Response
    {
        $request = $this->buildRequest(
            method: HttpMethodsEnum::Get,
            action: FlexbeActionEnum::GetLeads,
            apiKey: $clientFlexbeDto->getApiKey(),
        );

        return $this->httpService->request($request, $clientFlexbeDto);
    }

    /**
     * @throws InvalidMethodException
     * @throws BadRequestException
     */
    public function changeLead(FlexbeApiClientDto $clientFlexbeDto): Response
    {
        $request = $this->buildRequest(
            method: HttpMethodsEnum::Post,
            action: FlexbeActionEnum::ChangeLead,
            apiKey: $clientFlexbeDto->getApiKey(),
            data: [],
        );

        return $this->httpService->request($request, $clientFlexbeDto);
    }

    private function buildRequest(
        HttpMethodsEnum $method,
        FlexbeActionEnum $action,
        string $apiKey,
        ?array $data = null,
    ): Request {
        return new Request(
            method: $method,
            action: $action,
            apiKey: $apiKey,
            data: $data,
        );
    }
}
