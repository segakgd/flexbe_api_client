<?php

namespace Segakgd\FlexbeApiClient\Dto\Request;

use Segakgd\FlexbeApiClient\Enum\LeadStatusEnum;

readonly class LeadUpdateRequest
{
    public function __construct(
        private int $id,
        private ?LeadStatusEnum $status = null,
    ) {
    }

    public function toArray(): array
    {
        return array_filter(
            [
                'id' => $this->id,
                'status' => $this->status?->value,
            ],
            static function ($var) { return $var !== null; }
        );
    }
}
