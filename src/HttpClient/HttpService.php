<?php

namespace Segakgd\FlexbeApiClient\HttpClient;

use Segakgd\FlexbeApiClient\Dto\FlexbeApiClientDto;
use Segakgd\FlexbeApiClient\Exception\BadRequestException;
use Segakgd\FlexbeApiClient\Exception\InvalidApiKeyException;
use Segakgd\FlexbeApiClient\Exception\LimitExceededException;
use Segakgd\FlexbeApiClient\Exception\UndefinedActionException;
use Segakgd\FlexbeApiClient\Exception\UnknownErrorException;
use Segakgd\FlexbeApiClient\Helper\FlexbeErrorHelper;
use Segakgd\FlexbeApiClient\HttpClient\Core\HttpClient;
use Segakgd\FlexbeApiClient\HttpClient\Request\Request;
use Segakgd\FlexbeApiClient\HttpClient\Response\Response;

class HttpService
{
    private const URI_FORMAT = 'https://%s/mod/api/';

    /**
     * @throws BadRequestException
     * @throws InvalidApiKeyException
     * @throws LimitExceededException
     * @throws UndefinedActionException
     * @throws UnknownErrorException
     */
    public function request(Request $request, FlexbeApiClientDto $clientFlexbeDto): Response
    {
        $date = $request->getData() ?? [];

        $date['api_key'] = $clientFlexbeDto->getApiKey();
        $date['method'] = $request->getAction()->value;

        $response = (new HttpClient)->request(
            uri: $this->makeUri($clientFlexbeDto),
            requestArray: $date,
        );

        $response = Response::mapFromArray($response);

        if ($response->isError()) {
            FlexbeErrorHelper::throwByError($response->getError());
        }

        return $response;
    }

    private function makeUri(FlexbeApiClientDto $clientFlexbeDto): string
    {
        return sprintf(
            static::URI_FORMAT,
            $clientFlexbeDto->getDomain(),
        );
    }
}
