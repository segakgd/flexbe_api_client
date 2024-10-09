<?php

namespace Segakgd\FlexbeApiClient\Dto\Response;

readonly class UtmDto
{
    public function __construct(
        private ?string $ip,
        private ?string $utmSource,
        private ?string $utmCampaign,
        private ?string $utmMedium,
        private ?string $utmTerm,
        private ?string $utmContent,
        private ?string $url,
        private ?string $ymClientId,
        private ?string $gaClientId,
    ) {
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function getUtmSource(): ?string
    {
        return $this->utmSource;
    }

    public function getUtmCampaign(): ?string
    {
        return $this->utmCampaign;
    }

    public function getUtmMedium(): ?string
    {
        return $this->utmMedium;
    }

    public function getUtmTerm(): ?string
    {
        return $this->utmTerm;
    }

    public function getUtmContent(): ?string
    {
        return $this->utmContent;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getYmClientId(): ?string
    {
        return $this->ymClientId;
    }

    public function getGaClientId(): ?string
    {
        return $this->gaClientId;
    }

    public static function makeFromArray(array $data): static
    {
        return new static(
            ip: $data['ip'] ?? null,
            utmSource: $data['utm_source'] ?? null,
            utmCampaign: $data['utm_campaign'] ?? null,
            utmMedium: $data['utm_medium'] ?? null,
            utmTerm: $data['utm_term'] ?? null,
            utmContent: $data['utm_content'] ?? null,
            url: $data['url'] ?? null,
            ymClientId: $data['ym_client_id'] ?? null,
            gaClientId: $data['ga_client_id'] ?? null,
        );
    }
}