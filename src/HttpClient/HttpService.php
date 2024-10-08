<?php

namespace Segakgd\FlexbeApiClient\HttpClient;

use Segakgd\FlexbeApiClient\Dto\FlexbeApiClientDto;
use Segakgd\FlexbeApiClient\HttpClient\Core\HttpClient;
use Segakgd\FlexbeApiClient\HttpClient\Exception\BadRequestException;
use Segakgd\FlexbeApiClient\HttpClient\Exception\InvalidMethodException;
use Segakgd\FlexbeApiClient\HttpClient\Request\Request;
use Segakgd\FlexbeApiClient\HttpClient\Response\Response;

class HttpService
{
    private const string URI_FORMAT = 'https://%s/mod/api/?api_key=%s&method=%s';

    /**
     * @throws BadRequestException
     * @throws InvalidMethodException
     */
    public function request(Request $request, FlexbeApiClientDto $clientFlexbeDto): Response
    {
        $response = (new HttpClient)->request(
            uri: $this->makeUri($request, $clientFlexbeDto),
            requestArray: $request->getData() ?? [],
            method: $request->getMethod()
        );

        return Response::mapFromArray($response);
    }

    private function makeUri(Request $request, FlexbeApiClientDto $clientFlexbeDto): string
    {
        return sprintf(
            static::URI_FORMAT,
            $clientFlexbeDto->getDomain(),
            $clientFlexbeDto->getApiKey(),
            $request->getAction()->value
        );
    }
}
