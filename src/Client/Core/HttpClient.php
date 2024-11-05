<?php

namespace Segakgd\FlexbeApiClient\Client\Core;

use Segakgd\FlexbeApiClient\Exception\BadRequestException;

class HttpClient
{
    /**
     * @throws BadRequestException
     */
    public function request(string $uri, array $requestArray): array
    {
        $curl = curl_init($uri);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($requestArray)
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        if (!$response) {
            throw new BadRequestException();
        }

        return json_decode($response, true) ?? [];
    }
}
