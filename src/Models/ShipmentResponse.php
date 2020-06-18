<?php

namespace HarmSmits\SendCloudClient\Models;

class ShipmentResponse extends AModel
{
    protected string $externalOrderId = "";

    protected string $externalShipmentId = "";

    protected string $shipmentUuid = "";

    protected string $status = "";

    protected array $error;

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

    public function setShipmentUuid(string $shipmentUuid): self
    {
        $this->shipmentUuid = $shipmentUuid;
        return $this;
    }

    public function getShipmentUuid(): string
    {
        return $this->shipmentUuid;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setError(array $error): self
    {
        $this->error = $error;
        return $this;
    }

    public function getError(): array
    {
        return $this->error;
    }

    public function __toArray(): array
    {
        return [
            "external_order_id" => $this->getExternalOrderId(),
            "external_shipment_id" => $this->getExternalShipmentId(),
            "shipment_uuid" => $this->getShipmentUuid(),
            "status" => $this->getStatus(),
            "error" => $this->getError()
        ];
    }
}