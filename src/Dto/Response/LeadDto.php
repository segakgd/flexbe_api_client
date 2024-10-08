<?php

namespace Segakgd\FlexbeApiClient\Dto\Response;

use Segakgd\FlexbeApiClient\HttpClient\Enum\LeadStatusEnum;

readonly class LeadDto
{
    public function __construct(
        private int $id,
        private int $number,
        private ?LeadStatusEnum $status,
        private ?ClientInfoDto $client,
        private ?string $note,
        private string $formName,
        private array $formData,
        private array $products,
        private array $page,
        private array $utm,
        private ?array $pay,
        private int $createdAt,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getStatus(): ?LeadStatusEnum
    {
        return $this->status;
    }

    public function getClient(): ?ClientInfoDto
    {
        return $this->client;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function getFormName(): string
    {
        return $this->formName;
    }

    public function getFormData(): array
    {
        return $this->formData;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getPage(): array
    {
        return $this->page;
    }

    public function getUtm(): array
    {
        return $this->utm;
    }

    public function getPay(): ?array
    {
        return $this->pay;
    }

    public static function makeFromArray(array $data): static
    {
        return new static(
            id: $data['id'],
            number: $data['num'],
            status: isset($data['status']['code'])
                ? LeadStatusEnum::tryFrom($data['status']['code'])
                : null,
            client: isset($data['client'])
                ? ClientInfoDto::makeFromArray($data['client'])
                : null,
            note: $data['note'] ?? null,
            formName: $data['form_name'],
            formData: $data['form_data'],
            products: $data['products'],
            page: $data['page'],
            utm: $data['utm'],
            pay: $data['pay'] ?? null,
            createdAt: $data['time'],
        );
    }
}