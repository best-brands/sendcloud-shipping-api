<?php

namespace HarmSmits\SendCloudClient\Models;

class ParcelAddressDivided extends AModel
{
    protected ?string $street = null;

    protected ?string $houseNumber = null;

    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setHouseNumber(string $houseNumber): self
    {
        $this->houseNumber = $houseNumber;
        return $this;
    }

    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    public function __toArray(): array
    {
        return array_filter([
            "street" => $this->getStreet(),
            "house_number" => $this->getHouseNumber()
        ]);
    }
}