<?php

namespace Segakgd\FlexbeApiClient\Dto\Response;

use Segakgd\FlexbeApiClient\Enum\PaymentStatusEnum;

readonly class PayDto
{
    public function __construct(
        private string $id,
        private string $amount,
        private ?PaymentStatusEnum $status,
        private ?string $desc,
        private ?string $payLink,
        private string $createdAt,
        private ?string $paidAt,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getStatus(): ?PaymentStatusEnum
    {
        return $this->status;
    }

    public function getDesc(): ?string
    {
        return $this->desc;
    }

    public function getPayLink(): ?string
    {
        return $this->payLink;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getPaidAt(): ?string
    {
        return $this->paidAt;
    }

    public static function makeFromArray(array $data): static
    {
        return new static(
            id: $data['id'],
            amount: $data['summ'],
            status: PaymentStatusEnum::tryFrom($data['status']['code']),
            desc: $data['desc'] ?? null,
            payLink: $data['pay_link'] ?? null,
            createdAt: $data['time_create'],
            paidAt: $data['time_done'] ?? null,
        );
    }
}