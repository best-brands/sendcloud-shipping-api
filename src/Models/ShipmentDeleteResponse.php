<?php

namespace HarmSmits\SendCloudClient\Models;

class ShipmentDeleteResponse extends AModel
{
    protected string $externalOrderId = "";

    protected string $externalShipmentId = "";

    public function setExternalOrderId(string $externalOrderId): self
    {
        $this->externalOrderId = $externalOrderId;
        return $this;
    }

    public function getExternalOrderId(): string
    {
        return $this->externalOrderId;
    }

    public function setExternalShipmentId(string $externalShipmentId): self
    {
        $this->externalShipmentId = $externalShipmentId;
        return $this;
    }

    public function getExternalShipmentId(): string
    {
        return $this->externalShipmentId;
    }

    public function __toArray(): array
    {
        return [
            "external_order_id" => $this->getExternalOrderId(),
            "external_shipment_id" => $this->getExternalShipmentId()
        ];
    }
}