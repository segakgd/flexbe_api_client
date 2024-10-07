<?php

namespace Segakgd\FlexbeApiClient\HttpClient;

use Segakgd\FlexbeApiClient\HttpClient\Core\HttpClient;
use Segakgd\FlexbeApiClient\HttpClient\Exception\BadRequestException;
use Segakgd\FlexbeApiClient\HttpClient\Exception\InvalidMethodException;
use Segakgd\FlexbeApiClient\HttpClient\Request\Request;
use Segakgd\FlexbeApiClient\HttpClient\Response\Response;

class HttpService
{
    /**
     * @throws BadRequestException
     * @throws InvalidMethodException
     */
    public function request(Request $request): Response
    {
        $uri = ''; // todo

        $response = (new HttpClient)->request(
            uri: $uri,
            requestArray: $request->getData() ?? [],
            method: $request->getMethod()
        );

        return Response::mapFromArray($response);
    }
}
