<?php

namespace HarmSmits\SendCloudClient\Models;

use DateTime;
use HarmSmits\SendCloudClient\Exception\InvalidArgumentException;

class Shipment extends AModel
{
    protected string $address = "";

    protected string $address2 = "";

    protected array $allowedShippingMethods = [];

    protected string $barcode = "";

    protected string $city = "";

    protected string $companyName = "";

    protected string $country = "";

    protected DateTime $createdAt;

    protected string $currency = "";

    protected string $customsInvoiceNr = "";

    protected int $customsShipmentType = 0;

    protected string $email = "";

    protected string $externalOrderId = "";

    protected string $externalShipmentId = "";

    protected string $houseNumber = "";

    protected int $integration = 0;

    protected string $name = "";

    protected string $orderNumber = "";

    protected ParcelStatus $orderStatus;

    protected string $shipmentUuid = "";

    protected array $parcelItems = [];
    
    protected ParcelStatus $paymentStatus;

    protected string $postalCode = "";

    protected int $senderAddress = 0;

    protected int $shippingMethod = 0;

    protected string $shippingMethodCheckoutName = "";

    protected DateTime $updatedAt;

    protected string $telephone = "";

    protected string $toPostNumber = "";

    protected string $toServicePoint = "";

    protected string $toState = "";

    protected string $weight = "";

    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->orderStatus = new ParcelStatus();
        $this->paymentStatus = new ParcelStatus();
        $this->updatedAt = new DateTime();
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress2(string $address2): self
    {
        $this->address2 = $address2;
        return $this;
    }

    public function getAddress2(): string
    {
        return $this->address2;
    }

    public function setAllowedShippingMethods(array $allowedShippingMethods): self
    {
        array_walk($allowedShippingMethods, function ($allowedShippingMethod) {
            if (!is_int($allowedShippingMethod))
                throw new InvalidArgumentException("Not pure array of integers");
        });
        $this->allowedShippingMethods = $allowedShippingMethods;
        return $this;
    }

    public function getAllowedShippingMethods(): array
    {
        return $this->allowedShippingMethods;
    }

    public function setBarcode(string $barcode): self
    {
        $this->barcode = $barcode;
        return $this;
    }

    public function getBarcode(): string
    {
        return $this->barcode;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCreatedAt($createdAt): self
    {
        if (is_string($createdAt))
            $createdAt = DateTime::createFromFormat("Y-m-d\TH:i:s.uT", $createdAt);

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

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
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

    public function setCustomsShipmentType(int $shipmentType): self
    {
        $this->_checkIntegerBounds($shipmentType, 0, 4);
        $this->customsShipmentType = $shipmentType;
        return $this;
    }

    public function getCustomsShipmentType(): int
    {
        return $this->customsShipmentType;
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

    public function setHouseNumber(string $houseNumber): self
    {
        $this->houseNumber = $houseNumber;
        return $this;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setIntegration(int $integration): self
    {
        $this->integration = $integration;
        return $this;
    }

    public function getIntegration(): int
    {
        return $this->integration;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
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

    public function setOrderStatus(ParcelStatus $orderStatus): self
    {
        $this->orderStatus = $orderStatus;
        return $this;
    }

    public function getOrderStatus(): ParcelStatus
    {
        return $this->orderStatus;
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

    public function setParcelItems(array $parcelItems): self
    {
        $this->_checkIfPureArray($parcelItems, ParcelItem::class);
        $this->parcelItems = $parcelItems;
        return $this;
    }

    public function getParcelItems(): array
    {
        return $this->parcelItems;
    }

    public function setPaymentStatus(ParcelStatus $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }

    public function getPaymentStatus(): ParcelStatus
    {
        return $this->paymentStatus;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setSenderAddress(int $senderAddress): self
    {
        $this->senderAddress = $senderAddress;
        return $this;
    }

    public function getSenderAddress(): int
    {
        return $this->senderAddress;
    }

    public function setShippingMethod(int $shippingMethod): self
    {
        $this->shippingMethod = $shippingMethod;
        return $this;
    }

    public function getShippingMethod(): int
    {
        return $this->shippingMethod;
    }

    public function setShippingMethodCheckoutName(string $shippingMethodCheckoutName): self
    {
        $this->shippingMethodCheckoutName = $shippingMethodCheckoutName;
        return $this;
    }

    public function getShippingMethodCheckoutName(): string
    {
        return $this->shippingMethodCheckoutName;
    }

    public function setUpdatedAt($updatedAt): self
    {
        if (is_string($updatedAt))
            $updatedAt = DateTime::createFromFormat("Y-m-d\TH:i:s.uT", $updatedAt);

        if ($updatedAt instanceof DateTime) {
            $this->updatedAt = $updatedAt;
        } else {
            throw new InvalidArgumentException("Not a correct format");
        }

        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }
    
    public function setToPostNumber(string $toPostNumber): self
    {
        $this->toPostNumber = $toPostNumber;
        return $this;
    }
    
    public function getToPostNumber(): string
    {
        return $this->toPostNumber;
    }

    public function setToServicePoint(string $toServicePoint): self
    {
        $this->toServicePoint = $toServicePoint;
        return $this;
    }

    public function getToServicePoint(): string
    {
        return $this->toServicePoint;
    }

    public function setToState(string $toState): self
    {
        $this->toState = $toState;
        return $this;
    }

    public function getToState(): string
    {
        return $this->toState;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }
    
    public function __toArray(): array
    {
        return array_filter([
            "address" => $this->getAddress(),
            "address_2" => $this->getAddress2(),
            "allowed_shipping_methods" => $this->getAllowedShippingMethods(),
            "barcode" => $this->getBarcode(),
            "city" => $this->getCity(),
            "company_name" => $this->getCompanyName(),
            "country" => $this->getCountry(),
            "created_at" => $this->getCreatedAt(),
            "currency" => $this->getCurrency(),
            "customs_invoice_nr" => $this->getCustomsInvoiceNr(),
            "customs_shipment_type" => $this->getCustomsShipmentType(),
            "email" => $this->getEmail(),
            "external_order_id" => $this->getExternalOrderId(),
            "external_shipment_id" => $this->getExternalShipmentId(),
            "house_number" => $this->getHouseNumber(),
            "integration" => $this->getIntegration(),
            "name" => $this->getName(),
            "order_number" => $this->getOrderNumber(),
            "order_status" => $this->_convert($this->getOrderStatus()),
            "shipment_uuid" => $this->getShipmentUuid(),
            "parcel_items" => $this->_convertPureArray($this->getParcelItems()),
            "payment_status" => $this->_convert($this->getPaymentStatus()),
            "postal_code" => $this->getPostalCode(),
            "sender_address" => $this->getSenderAddress(),
            "shipping_method" => $this->getShippingMethod(),
            "shipping_method_checkout_name" => $this->getShippingMethodCheckoutName(),
            "updated_at" => $this->getUpdatedAt(),
            "telephone" => $this->getTelephone(),
            "to_post_number" => $this->getToPostNumber(),
            "to_service_point" => $this->getToServicePoint(),
            "to_state" => $this->getToState(),
            "weight" => $this->getWeight()
        ]);
    }
}