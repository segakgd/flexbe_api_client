<?php

namespace Segakgd\FlexbeApiClient\Dto\Response;

readonly class ClientInfoDto
{
    public function __construct(
        private ?string $name,
        private ?string $phone,
        private ?string $email,
    ) {
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public static function makeFromArray(array $data): static
    {
        return new static(
            name: $data['name'] ?? null,
            phone: $data['phone'] ?? null,
            email: $data['email'] ?? null,
        );
    }
}
