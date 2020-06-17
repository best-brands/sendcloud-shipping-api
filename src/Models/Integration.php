<?php

namespace HarmSmits\SendCloudClient\Models;

use DateTime;
use HarmSmits\SendCloudClient\Exception\InvalidArgumentException;

class Integration extends AModel
{
    protected int $id = 0;

    protected string $shopName = "";

    protected string $shopUrl = "";

    protected string $system = "";

    protected ?string $failingSince = null;

    protected \DateTime $lastFetch;

    protected \DateTime $lastUpdatedAt;

    protected bool $servicePointEnabled = false;

    protected array $servicePointCarriers = [];

    protected bool $webhookActive = false;

    protected string $webhookUrl = "";

    public function __construct()
    {
        $this->lastFetch = new DateTime();
        $this->lastUpdatedAt = new DateTime();
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setShopName(string $shopName): self
    {
        $this->shopName = $shopName;
        return $this;
    }

    public function getShopName(): string
    {
        return $this->shopName;
    }

    public function setShopUrl(string $shopUrl): self
    {
        $this->shopUrl = $shopUrl;
        return $this;
    }

    public function getShopUrl(): string
    {
        return $this->shopUrl;
    }

    public function setSystem(string $system): self
    {
        $this->system = $system;
        return $this;
    }

    public function getSystem(): string
    {
        return $this->system;
    }

    public function setFailingSince(string $failingSince): self
    {
        $this->failingSince = $failingSince;
        return $this;
    }

    public function getFailingSince(): string
    {
        return $this->failingSince;
    }

    public function setLastFetch($lastFetch): self
    {
        if (is_string($lastFetch))
            $lastFetch = DateTime::createFromFormat("Y-m-d\TH:i:s.uT", $lastFetch);

        if ($lastFetch instanceof DateTime) {
            $this->lastFetch = $lastFetch;
        } else {
            throw new InvalidArgumentException("Not a correct format");
        }

        return $this;
    }

    public function getLastFetch(): ?DateTime
    {
        return $this->lastFetch;
    }

    public function setLastUpdatedAt($lastUpdatedAt): self
    {
        if (is_string($lastUpdatedAt))
            $lastUpdatedAt = DateTime::createFromFormat("Y-m-d\TH:i:s.uT", $lastUpdatedAt);

        if ($lastUpdatedAt instanceof DateTime) {
            $this->lastUpdatedAt = $lastUpdatedAt;
        } else {
            throw new InvalidArgumentException("Not a correct format");
        }

        return $this;
    }

    public function getLastUpdatedAt(): ?DateTime
    {
        return $this->lastUpdatedAt;
    }

    public function setServicePointEnabled(bool $servicePointEnabled): self
    {
        $this->servicePointEnabled = $servicePointEnabled;
        return $this;
    }

    public function getServicePointEnabled(): bool
    {
        return $this->servicePointEnabled;
    }

    public function setServicePointCarriers(array $servicePointCarriers): self
    {
        array_walk($servicePointCarriers, function ($item) {
            if (is_string($item))
                throw new InvalidArgumentException("Array of carriers is not pure");
        });

        $this->servicePointCarriers = $servicePointCarriers;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getServicePointCarriers(): array
    {
        return $this->getServicePointCarriers();
    }

    public function setWebhookActive(bool $webhookActive): self
    {
        $this->webhookActive = $webhookActive;
        return $this;
    }

    public function getWebhookActive(): bool
    {
        return $this->webhookActive;
    }

    public function setWebhookUrl(string $webhookUrl): self
    {
        $this->webhookUrl = $webhookUrl;
        return $this;
    }

    public function getWebhookUrl(): string
    {
        return $this->webhookUrl;
    }

    public function __toArray(): array
    {
        return [
            "id" => $this->getId(),
            "shop_name" => $this->getShopName(),
            "shop_url" => $this->getShopUrl(),
            "system" => $this->getSystem(),
            "failing_since" => $this->getFailingSince(),
            "last_fetch" => $this->getLastFetch(),
            "last_updated_at" => $this->getLastUpdatedAt(),
            "service_point_enabled" => $this->getServicePointEnabled(),
            "service_point_carriers" => $this->getServicePointCarriers(),
            "webhook_active" => $this->getWebhookActive(),
            "webhook_url" => $this->getWebhookUrl()
        ];
    }
}