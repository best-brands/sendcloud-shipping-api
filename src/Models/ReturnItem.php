<?php

namespace HarmSmits\SendCloudClient\Models;

use DateTime;
use HarmSmits\SendCloudClient\Exception\InvalidArgumentException;

class ReturnItem extends AModel
{
    protected int $id = 0;

    protected string $email = "";

    protected ?DateTime $createdAt = null;

    protected string $reason = "";

    protected ?int $outgoingParcel = null;

    protected ?int $incomingParcel = null;

    protected string $message = "";

    protected string $status = "";

    protected Refund $refund;

    protected string $statusDisplay = "";

    protected bool $isCancelable = false;

    protected float $labelCost = 0;

    protected float $itemsCost = 0;

    protected ?DateTime $deliveredAt = null;

    protected string $deliveryOption = "";

    protected ParcelData $outgoingParcelData;

    protected ParcelData $incomingParcelData;

    protected GlobalStatus $incomingParcelStatus;

    public function __construct()
    {
        $this->outgoingParcelData = new ParcelData();
        $this->incomingParcelData = new ParcelData();
        $this->incomingParcelStatus = new GlobalStatus();
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->getId();
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setCreatedAt($createdAt): self
    {
        if (is_string($createdAt))
            $createdAt = DateTime::createFromFormat("m-d-Y H:i:s", $date);

        if ($createdAt instanceof DateTime) {
            $this->createdAt = $createdAt;
        } else {
            throw new InvalidArgumentException("Not a correct format");
        }

        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setReason(string $reason): self
    {
        $this->reason = $reason;
        return $this;
    }

    public function getReason(): string
    {
        return $this->reason;
    }

    public function setOutgoingParcel(int $parcelId): self
    {
        $this->outgoingParcel = $parcelId;
        return $this;
    }

    public function getOutgoingParcel(): ?int
    {
        return $this->outgoingParcel;
    }

    public function setIncomingParcel(int $parcelId): self
    {
        $this->incomingParcel = $parcelId;
        return $this;
    }

    public function getIncomingParcel(): ?int
    {
        return $this->incomingParcel;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
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

    public function setRefund(Refund $refund): self
    {
        $this->refund = $refund;
        return $this;
    }

    public function getRefund(): Refund
    {
        return $this->refund;
    }

    public function setStatusDisplay(string $statusDisplay): self
    {
        $this->statusDisplay = $statusDisplay;
        return $this;
    }

    public function getStatusDisplay(): string
    {
        return $this->statusDisplay;
    }

    public function setIsCancellable(bool $cancellable): self
    {
        $this->isCancelable = $cancellable;
        return $this;
    }

    public function getIsCancellable(): bool
    {
        return $this->isCancelable;
    }

    public function setLabelCost(float $labelCost): self
    {
        $this->labelCost = $labelCost;
        return $this;
    }

    public function getLabelCost(): float
    {
        return $this->labelCost;
    }

    public function setItemsCost(float $itemsCost): self
    {
        $this->itemsCost = $itemsCost;
        return $this;
    }

    public function getItemsCost(): float
    {
        return $this->itemsCost;
    }

    public function setDeliveredAt($deliveredAt): self
    {
        if (is_string($deliveredAt))
            $deliveredAt = DateTime::createFromFormat("m-d-Y H:i:s", $date);

        if ($deliveredAt instanceof DateTime) {
            $this->createdAt = $deliveredAt;
        } else {
            throw new InvalidArgumentException("Not a correct format");
        }

        return $this;
    }

    public function getDeliveredAt(): ?DateTime
    {
        return $this->deliveredAt;
    }

    public function setDeliveryOption(string $deliveryOption): self
    {
        $this->deliveryOption = $deliveryOption;
        return $this;
    }

    public function getDeliveryOption(): string
    {
        return $this->deliveryOption;
    }

    public function setOutgoingParcelData(ParcelData $parcelData): self
    {
        $this->outgoingParcelData = $parcelData;
        return $this;
    }

    public function getOutgoingParcelData(): ParcelData
    {
        return $this->outgoingParcelData;
    }

    public function setIncomingParcelData(ParcelData $parcelData): self
    {
        $this->incomingParcelData = $parcelData;
        return $this;
    }

    public function getIncomingParcelData(): ParcelData
    {
        return $this->incomingParcelData;
    }

    public function setIncomingParcelStatus(GlobalStatus $incomingParcelStatus): self
    {
        $this->incomingParcelStatus = $incomingParcelStatus;
        return $this;
    }

    public function getIncomingParcelStatus(): GlobalStatus
    {
        return $this->incomingParcelStatus;
    }

    public function __toArray(): array
    {
        return [
            "id" => $this->getId(),
            "email" => $this->getEmail(),
            "created_at" => $this->getCreatedAt()->format(DATE_ISO8601),
            "reason" => $this->getReason(),
            "outgoing_parcel" => $this->getOutgoingParcel(),
            "incoming_parcel" => $this->getIncomingParcel(),
            "message" => $this->getMessage(),
            "status" => $this->getStatus(),
            "refund" => $this->getRefund(),
            "status_display" => $this->getStatusDisplay(),
            "is_cancellable" => $this->getIsCancellable(),
            "label_cost" => $this->getLabelCost(),
            "items_cost" => $this->getItemsCost(),
            "delivered_at" => $this->getDeliveredAt(),
            "delivery_option" => $this->getDeliveryOption(),
            "outgoing_parcel_data" => $this->_convert($this->getOutgoingParcelData()),
            "incoming_parcel_data" => $this->_convert($this->getIncomingParcelData()),
            "incoming_parcel_status" => $this->_convert($this->getIncomingParcelStatus())
        ];
    }
}