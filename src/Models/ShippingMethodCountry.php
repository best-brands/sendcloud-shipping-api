<?php

namespace HarmSmits\SendCloudClient\Models;

class ShippingMethodCountry extends Country
{
    protected int $id = 0;

    protected float $price = 0;

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
        return array_filter([
            "iso_3" => $this->getIso3(),
            "iso_2" => $this->getIso2(),
            "id" => $this->getId(),
            "price" => $this->getPrice(),
            "name" => $this->getName()
        ]);
    }
}