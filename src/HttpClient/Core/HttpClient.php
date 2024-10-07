<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Core;

use Segakgd\FlexbeApiClient\HttpClient\Enum\HttpMethodsEnum;
use Segakgd\FlexbeApiClient\HttpClient\Exception\BadRequestException;
use Segakgd\FlexbeApiClient\HttpClient\Exception\InvalidMethodException;

class HttpClient
{
    /**
     * @throws BadRequestException
     * @throws InvalidMethodException
     */
    public function request(string $uri, array $requestArray, HttpMethodsEnum $method): array
    {
        $response = match ($method) {
            HttpMethodsEnum::Get => $this->sendGet($uri, $requestArray),
            HttpMethodsEnum::Post => $this->sendPost($uri, $requestArray),
            default => throw new InvalidMethodException($method),
        };

        return json_decode($response ?? '', true) ?? [];
    }

    /**
     * @throws BadRequestException
     */
    private function sendGet(string $uri, array $requestArray): string
    {
        $curl = curl_init($uri . http_build_query($requestArray));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);

        curl_close($curl);

        if (!$response) {
            throw new BadRequestException();
        }

        return $response;
    }

    /**
     * @throws BadRequestException
     */
    private function sendPost(string $uri, array $requestArray): string
    {
        $curl = curl_init($uri);

        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($requestArray, '', '&'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);

        curl_close($curl);

        if (!$response) {
            throw new BadRequestException();
        }

        return $response;
    }
}
