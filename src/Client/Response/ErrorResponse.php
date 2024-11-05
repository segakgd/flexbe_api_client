<?php

namespace Segakgd\FlexbeApiClient\Client\Response;

use Segakgd\FlexbeApiClient\Enum\ErrorCodeEnum;

readonly class ErrorResponse
{
    public function __construct(
        private ?ErrorCodeEnum $code,
        private ?string $message,
    ) {
    }

    public function getCode(): ?ErrorCodeEnum
    {
        return $this->code;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public static function mapFromArray(array $data): ErrorResponse
    {
        return new static(
            code: isset($data['code'])
                ? ErrorCodeEnum::from($data['code'])
                : null,
            message: $data['msg'] ?? null,
        );
    }
}
