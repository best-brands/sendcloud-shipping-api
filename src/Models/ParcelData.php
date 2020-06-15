<?php

namespace HarmSmits\SendCloudClient\Models;

class ParcelData extends AModel
{
    protected string $trackingUrl = "";

    protected string $trackingNumber = "";

    protected int $parcelStatus = 0;

    protected string $globalStatusSlug = "";

    protected string $brandName = "";

    protected string $orderNumber = "";

    protected string $fromEmail = "";

    protected bool $deleted = false;

    public function setTrackingUrl(string $trackingUrl): self
    {
        $this->trackingUrl = $trackingUrl;
        return $this;
    }

    public function getTrackingUrl(): string
    {
        return $this->trackingUrl;
    }

    public function setTrackingNumber(string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    public function getTrackingNumber(): string
    {
        return $this->trackingNumber;
    }

    public function setParcelStatus(int $parcelStatus): self
    {
        $this->parcelStatus = $parcelStatus;
        return $this;
    }

    public function getParcelStatus(): int
    {
        return $this->parcelStatus;
    }

    public function setGlobalStatusSlug(string $globalStatusSlug): self
    {
        $this->globalStatusSlug = $globalStatusSlug;
        return $this;
    }

    public function getGlobalStatusSlug(): string
    {
        return $this->globalStatusSlug;
    }

    public function setBrandName(string $brandName): self
    {
        $this->brandName = $brandName;
        return $this;
    }

    public function getBrandName(): string
    {
        return $this->brandName;
    }

    public function setOrderNumber(string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    public function setFromEmail(string $fromEmail): self
    {
        $this->fromEmail = $fromEmail;
        return $this;
    }

    public function getFromEmail(): string
    {
        return $this->fromEmail;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;
        return $this;
    }

    public function getDeleted(): bool
    {
        return $this->deleted;
    }

    public function __toArray(): array
    {
        return [
            "tracking_url" => $this->getTrackingUrl(),
            "tracking_number" => $this->getTrackingNumber(),
            "parcel_status" => $this->getParcelStatus(),
            "global_status_slug" => $this->getGlobalStatusSlug(),
            "brand_name" => $this->getBrandName(),
            "order_number" => $this->getOrderNumber(),
            "from_email" => $this->getFromEmail(),
            "deleted" => $this->getDeleted()
        ];
    }
}