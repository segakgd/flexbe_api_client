<?php

namespace Segakgd\FlexbeApiClient\HttpClient;

use Segakgd\FlexbeApiClient\Dto\FlexbeApiClientDto;
use Segakgd\FlexbeApiClient\Exception\BadRequestException;
use Segakgd\FlexbeApiClient\Exception\Http\InvalidApiKeyException;
use Segakgd\FlexbeApiClient\Exception\Http\LimitExceededException;
use Segakgd\FlexbeApiClient\Exception\Http\UndefinedActionException;
use Segakgd\FlexbeApiClient\Exception\Http\UnknownErrorException;
use Segakgd\FlexbeApiClient\Exception\InvalidMethodException;
use Segakgd\FlexbeApiClient\Helper\FlexbeErrorHelper;
use Segakgd\FlexbeApiClient\HttpClient\Core\HttpClient;
use Segakgd\FlexbeApiClient\HttpClient\Request\Request;
use Segakgd\FlexbeApiClient\HttpClient\Response\Response;

class HttpService
{
    private const URI_FORMAT = 'https://%s/mod/api/?api_key=%s&method=%s';

    /**
     * @throws BadRequestException
     * @throws InvalidApiKeyException
     * @throws LimitExceededException
     * @throws UndefinedActionException
     * @throws UnknownErrorException
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
