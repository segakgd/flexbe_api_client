<?php

namespace Segakgd\FlexbeApiClient;

use Segakgd\FlexbeApiClient\Dto\Collections;
use Segakgd\FlexbeApiClient\Dto\FlexbeApiClientDto;
use Segakgd\FlexbeApiClient\Dto\Request\LeadFilterRequest;
use Segakgd\FlexbeApiClient\Dto\Request\LeadUpdateRequest;
use Segakgd\FlexbeApiClient\Dto\Response\LeadDto;
use Segakgd\FlexbeApiClient\Enum\FlexbeActionEnum;
use Segakgd\FlexbeApiClient\Exception\BadRequestException;
use Segakgd\FlexbeApiClient\Exception\InvalidApiKeyException;
use Segakgd\FlexbeApiClient\Exception\LimitExceededException;
use Segakgd\FlexbeApiClient\Exception\UndefinedActionException;
use Segakgd\FlexbeApiClient\Exception\UnknownErrorException;
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
     */
    public function getLeads(
        FlexbeApiClientDto $clientFlexbeDto,
        ?LeadFilterRequest $leadFilterRequest = null
    ): Collections {
        $request = $this->buildRequest(
            action: FlexbeActionEnum::GetLeads,
            apiKey: $clientFlexbeDto->getApiKey(),
            data: $leadFilterRequest?->toArray()
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
     * @throws InvalidApiKeyException
     * @throws LimitExceededException
     * @throws UndefinedActionException
     * @throws UnknownErrorException
     */
    public function changeLead(FlexbeApiClientDto $clientFlexbeDto, LeadUpdateRequest $leadUpdateRequest): LeadDto
    {
        $request = $this->buildRequest(
            action: FlexbeActionEnum::ChangeLead,
            apiKey: $clientFlexbeDto->getApiKey(),
            data: $leadUpdateRequest->toArray()
        );

        $data = $this->httpService->request($request, $clientFlexbeDto)->getData();
        $lead = $data['lead'];

        return LeadDto::makeFromArray($lead);
    }

    private function buildRequest(
        FlexbeActionEnum $action,
        string $apiKey,
        ?array $data = null,
    ): Request {
        return new Request(
            action: $action,
            apiKey: $apiKey,
            data: $data,
        );
    }
}
