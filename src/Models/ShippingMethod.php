<?php

namespace HarmSmits\SendCloudClient\Models;

class ShippingMethod extends AModel
{
    protected string $servicePointInput = "";

    protected string $maxWeight = "";

    protected string $name = "";

    protected string $carrier = "";

    protected array $countries = [];

    protected string $minWeight = "";

    protected int $id = 0;

    protected float $price = 0;

    public function setServicePointInput(string $servicePointInput): self
    {
        $this->servicePointInput = $servicePointInput;
        return $this;
    }

    public function getServicePointInput(): string
    {
        return $this->servicePointInput;
    }

    public function setMaxWeight(string $maxWeight): self
    {
        $this->maxWeight = $maxWeight;
        return $this;
    }

    public function getMaxWeight(): string
    {
        return $this->maxWeight;
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

    public function setCarrier(string $carrier): self
    {
        $this->carrier = $carrier;
        return $this;
    }

    public function getCarrier(): string
    {
        return $this->carrier;
    }

    public function setCountries(array $countries): self
    {
        $this->_checkIfPureArray($countries, ShippingMethodCountry::class);
        $this->countries = $countries;
        return $this;
    }

    public function getCountries(): array
    {
        return $this->countries;
    }

    public function addCountry(ShippingMethodCountry $country): self
    {
        $this->countries[] = $country;
        return $this;
    }

    public function setMinWeight(string $minWeight): self
    {
        $this->minWeight = $minWeight;
        return $this;
    }

    public function getMinWeight(): string
    {
        return $this->minWeight;
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

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function __toArray(): array
    {
        return [
            "service_point_input" => $this->getServicePointInput(),
            "max_weight" => $this->getMaxWeight(),
            "name" => $this->getName(),
            "carrier" => $this->getCarrier(),
            "countries" => $this->_convertPureArray($this->getCountries()),
            "min_weight" => $this->getMinWeight(),
            "id" => $this->getId(),
            "price" => $this->getPrice()
        ];
    }
}