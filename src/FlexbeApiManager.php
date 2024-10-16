<?php

namespace Segakgd\FlexbeApiClient;

use Segakgd\FlexbeApiClient\Dto\Collections;
use Segakgd\FlexbeApiClient\Dto\FlexbeApiClientDto;
use Segakgd\FlexbeApiClient\Dto\Response\LeadDto;
use Segakgd\FlexbeApiClient\Enum\FlexbeActionEnum;
use Segakgd\FlexbeApiClient\Enum\HttpMethodsEnum;
use Segakgd\FlexbeApiClient\Exception\BadRequestException;
use Segakgd\FlexbeApiClient\Exception\Http\InvalidApiKeyException;
use Segakgd\FlexbeApiClient\Exception\Http\LimitExceededException;
use Segakgd\FlexbeApiClient\Exception\Http\UndefinedActionException;
use Segakgd\FlexbeApiClient\Exception\Http\UnknownErrorException;
use Segakgd\FlexbeApiClient\Exception\InvalidMethodException;
use Segakgd\FlexbeApiClient\HttpClient\HttpService;
use Segakgd\FlexbeApiClient\HttpClient\Request\Request;

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
     * @throws InvalidApiKeyException
     * @throws LimitExceededException
     * @throws UndefinedActionException
     * @throws UnknownErrorException
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
