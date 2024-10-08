<?php

namespace Segakgd\FlexbeApiClient\HttpClient;

use Segakgd\FlexbeApiClient\Dto\FlexbeApiClientDto;
use Segakgd\FlexbeApiClient\HttpClient\Core\HttpClient;
use Segakgd\FlexbeApiClient\HttpClient\Exception\BadRequestException;
use Segakgd\FlexbeApiClient\HttpClient\Exception\InvalidMethodException;
use Segakgd\FlexbeApiClient\HttpClient\Helper\FlexbeErrorHelper;
use Segakgd\FlexbeApiClient\HttpClient\Request\Request;
use Segakgd\FlexbeApiClient\HttpClient\Response\Response;

class HttpService
{
    private const URI_FORMAT = 'https://%s/mod/api/?api_key=%s&method=%s';

    /**
     * @throws BadRequestException
     * @throws Exception\Http\InvalidApiKeyException
     * @throws Exception\Http\LimitExceededException
     * @throws Exception\Http\UndefinedActionException
     * @throws Exception\Http\UnknownErrorException
     * @throws InvalidMethodException
     */
    public function request(Request $request, FlexbeApiClientDto $clientFlexbeDto): Response
    {
        $response = (new HttpClient)->request(
            uri: $this->makeUri($request, $clientFlexbeDto),
            requestArray: $request->getData() ?? [],
            method: $request->getMethod()
        );

        $response = Response::mapFromArray($response);

        if ($response->isError()) {
            FlexbeErrorHelper::throwByError($response->getError());
        }

        return $response;
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
