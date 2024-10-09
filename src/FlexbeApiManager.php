<?php

namespace Segakgd\FlexbeApiClient;

use Segakgd\FlexbeApiClient\Dto\Collections;
use Segakgd\FlexbeApiClient\Dto\FlexbeApiClientDto;
use Segakgd\FlexbeApiClient\Dto\Response\LeadDto;
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
     * @return Collections<int, LeadDto>
     *
     * @throws BadRequestException
     * @throws HttpClient\Exception\Http\InvalidApiKeyException
     * @throws HttpClient\Exception\Http\LimitExceededException
     * @throws HttpClient\Exception\Http\UndefinedActionException
     * @throws HttpClient\Exception\Http\UnknownErrorException
     * @throws InvalidMethodException
     */
    public function getLeads(FlexbeApiClientDto $clientFlexbeDto): Collections
    {
        $request = $this->buildRequest(
            method: HttpMethodsEnum::Get,
            action: FlexbeActionEnum::GetLeads,
            apiKey: $clientFlexbeDto->getApiKey(),
        );

        $data = $this->httpService->request($request, $clientFlexbeDto)->getData();
        $leads = $data['leads'];

        $collections = new Collections();

        if (empty($leads)) {
            return $collections;
        }

        foreach ($leads as $lead) {
            $collections->add(LeadDto::makeFromArray($lead));
        }

        return $collections;
    }

    /**
     * @throws BadRequestException
     * @throws HttpClient\Exception\Http\InvalidApiKeyException
     * @throws HttpClient\Exception\Http\LimitExceededException
     * @throws HttpClient\Exception\Http\UndefinedActionException
     * @throws HttpClient\Exception\Http\UnknownErrorException
     * @throws InvalidMethodException
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
