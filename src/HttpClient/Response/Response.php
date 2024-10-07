<?php

namespace Segakgd\FlexbeApiClient\HttpClient\Response;

readonly class Response
{
    public function __construct(
        private int $code,
        private array $result,
        private string $description,
    ) {
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getResult(): array
    {
        return $this->result;
    }

    public static function mapFromArray(array $data): Response
    {
        return new static(
            code: isset($data['ok']) ? 200 : 400,
            result: $data['result'] ?? [],
            description: $data['description'] ?? '',
        );
    }
}
