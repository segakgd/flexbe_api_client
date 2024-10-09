<?php

namespace Segakgd\FlexbeApiClient\Dto\Response;

readonly class PageDto
{
    public function __construct(
        private string $url,
        private string $name,
    ) {
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public static function makeFromArray(array $data): static
    {
        return new static(
            url: $data['url'],
            name: $data['name'],
        );
    }
}
