<?php

namespace Segakgd\FlexbeApiClient\Client\Response;

readonly class Response
{
    public function __construct(
        private array $data,
        private ?ErrorResponse $error,
    ) {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getError(): ?ErrorResponse
    {
        return $this->error;
    }

    public function isError(): bool
    {
        return !is_null($this->error);
    }

    public static function mapFromArray(array $data): Response
    {
        return new static(
            data: $data['data'] ?? [],
            error: isset($data['error'])
                ? ErrorResponse::mapFromArray($data['error'])
                : null,
        );
    }
}
