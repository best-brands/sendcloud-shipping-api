<?php

namespace HarmSmits\SendCloudClient\Models;

class Parcel extends ReducedParcel
{
    protected ?string $address2 = "";

    protected ?string $customsInvoiceNr = "";

    protected ?int $customsShipmentType = 0;

    protected ?string $orderNumber = "";

    protected ?array $parcelItems = [];

    protected ?string $externalReference = "";

    protected array $documents = [];

    protected ?string $toServicePoint = null;

    protected ?string $toState = null;

    protected int $insuredValue = 0;

    protected ?int $totalInsuredValue = 0;

    protected string $shipmentUuid = "";

    protected ?string $trackingUrl = "";

    protected ?string $type = "parcel";

    protected Carrier $carrier;

    public function setAddress2(string $address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    public function getAddress2(): string
    {
        return $this->address2;
    }

    public function setCustomsInvoiceNr(string $customsInvoiceNr): self
    {
        $this->customsInvoiceNr = $customsInvoiceNr;
        return $this;
    }

    public function getCustomsInvoiceNr(): ?string
    {
        return $this->customsInvoiceNr;
    }

    public function setCustomsShipmentType(?int $shipmentType): self
    {
        $this->_checkIntegerBounds($shipmentType, 0, 4);
        $this->customsShipmentType = $shipmentType;
        return $this;
    }

    public function getCustomsShipmentType(): ?int
    {
        return $this->customsShipmentType;
    }

    public function setOrderNumber(?string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setParcelItems(?array $parcelItems): self
    {
        $this->parcelItems = $parcelItems;
        return $this;
    }

    public function getParcelItems(): ?array
    {
        return $this->parcelItems;
    }

    public function setExternalReference(?string $externalReference): self
    {
        $this->externalReference = $externalReference;
        return $this;
    }

    public function getExternalReference(): string
    {
        return $this->externalReference;
    }

    public function setDocuments(array $documents): self
    {
        $this->_checkIfPureArray($documents, Document::class);
        $this->documents = $documents;
        return $this;
    }

    public function getDocuments(): array
    {
        return $this->documents;
    }

    public function setToServicePoint(string $toServicePoint): self
    {
        $this->toServicePoint = $toServicePoint;
        return $this;
    }

    public function getToServicePoint(): ?string
    {
        return $this->toServicePoint;
    }

    public function setToState(string $toState): self
    {
        $this->toState = $toState;
        return $this;
    }

    public function getToState(): ?string
    {
        return $this->toState;
    }

    public function setInsuredValue(int $insuredValue): self
    {
        $this->insuredValue = $insuredValue;
        return $this;
    }

    public function getInsuredValue(): int
    {
        return $this->insuredValue;
    }

    public function setTotalInsuredValue(int $totalInsuredValue): self
    {
        $this->totalInsuredValue = $totalInsuredValue;
        return $this;
    }

    public function getTotalInsuredValue(): int
    {
        return $this->totalInsuredValue;
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

    public function setTrackingUrl(string $trackingUrl): self
    {
        $this->trackingUrl = $trackingUrl;
        return $this;
    }

    public function getTrackingUrl(): string
    {
        return $this->trackingUrl;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setCarrier(Carrier $carrier): self
    {
        $this->carrier = $carrier;
        return $this;
    }

    public function getCarrier(): Carrier
    {
        return $this->carrier;
    }

    public function __toArray(): array
    {
        return array_filter([
            "address" => $this->getAddress(),
            "address_2" => $this->getAddress2(),
            "address_divided" => $this->_convert($this->getAddressDivided()),
            "carrier" => $this->_convert($this->getCarrier()),
            "city" => $this->getCity(),
            "company_name" => $this->getCompanyName(),
            "country" => $this->_convert($this->getCountry()),
            "customs_invoice_nr" => $this->getCustomsInvoiceNr(),
            "customs_shipment_type" => $this->getCustomsShipmentType(),
            "data" => $this->getData(),
            "date_created" => $this->getDateCreated(),
            "email" => $this->getEmail(),
            "id" => $this->getid(),
            "insured_value" => $this->getInsuredValue(),
            "label" => $this->getLabel(),
            "name" => $this->getName(),
            "order_number" => $this->getOrderNumber(),
            "shipment_uuid" => $this->getShipmentUuid(),
            "parcel_items" => $this->getParcelItems(),
            "postal_code" => $this->getPostalCode(),
            "external_reference" => $this->getExternalReference(),
            "shipment" => $this->_convert($this->getShipment()),
            "status" => $this->_convert($this->getStatus()),
            "documents" => $this->_convertPureArray($this->getDocuments()),
            "telephone" => $this->getTelephone(),
            "to_service_point" => $this->getToServicePoint(),
            "to_state" => $this->getToState(),
            "total_insured_value" => $this->getTotalInsuredValue(),
            "tracking_number" => $this->getTrackingNumber(),
            "tracking_url" => $this->getTrackingUrl(),
            "weight" => $this->getWeight(),
            "type" => $this->getType()
        ]);
    }
}