<?php

namespace Segakgd\FlexbeApiClient\Dto\Request;

use Segakgd\FlexbeApiClient\Enum\LeadStatusEnum;

readonly class LeadFilterRequest
{
    public function __construct(
        private ?LeadStatusEnum $status = null,
        private ?int $start = null,
        private ?int $count = null,
    ) {
    }

    public function toArray(): array
    {
        return array_filter(
            [
                'status' => $this->status?->value,
                'start' => $this->start,
                'count' => $this->count,
            ],
            static function ($var) { return $var !== null; }
        );
    }
}
