<?php

namespace HarmSmits\SendCloudClient\Models;

class NewParcel extends AModel
{
    protected string $name = "";

    protected string $companyName = "";

    protected string $address = "";

    protected string $houseNumber = "";

    protected string $city = "";

    protected string $postalCode = "";

    protected string $telephone = "";

    protected bool $requestLabel = true;

    protected string $email = "";

    protected array $data = [];

    protected string $country = "";

    protected ?ParcelShipment $shipment = null;

    protected float $weight = 0;

    protected string $orderNumber = "";

    protected int $insuredValue = 0;

    protected string $externalReference = "";

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
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

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
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

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
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

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setRequestLabel(bool $requestLabel): self
    {
        $this->requestLabel = $requestLabel;
        return $this;
    }

    public function getRequestLabel(): bool
    {
        return $this->requestLabel;
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

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
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

    public function setShipment(ParcelShipment $parcelShipment): self
    {
        $this->shipment = $parcelShipment;
        return $this;
    }

    public function getShipment(): ?ParcelShipment
    {
        return $this->shipment;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    public function getWeight(): float
    {
        return $this->weight;
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

    public function setInsuredValue(int $insuredValue): self
    {
        $this->insuredValue = $insuredValue;
        return $this;
    }

    public function getInsuredValue(): int
    {
        return $this->insuredValue;
    }

    public function __toArray(): array
    {
        return array_filter([
            "name" => $this->getName(),
            "company_name" => $this->getCompanyName(),
            "address" => $this->getAddress(),
            "house_number" => $this->getHouseNumber(),
            "city" => $this->getCity(),
            "postal_code" => $this->getPostalCode(),
            "telephone" => $this->getTelephone(),
            "request_label" => $this->getRequestLabel(),
            "email" => $this->getEmail(),
            "data" => $this->getData(),
            "country" => $this->getCountry(),
            "shipment" => $this->_convert($this->getShipment()),
            "weight" => $this->getWeight(),
            "order_number" => $this->getOrderNumber(),
            "insured_value" => $this->getInsuredValue()
        ]);
    }
}