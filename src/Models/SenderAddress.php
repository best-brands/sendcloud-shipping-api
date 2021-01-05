<?php

namespace HarmSmits\SendCloudClient\Models;

class SenderAddress extends AModel
{
    protected int $id = 0;

    protected string $companyName = "";

    protected string $contactName = "";

    protected string $email = "";

    protected string $telephone = "";

    protected string $street = "";

    protected string $houseNumber = "";

    protected string $postalBox = "";

    protected string $postalCode = "";

    protected string $city = "";

    protected string $country = "";

    protected string $vatNumber = "";

    protected string $cocNumber = "";

    protected string $eoriNumber = "";
    
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId(): int
    {
        return $this->id;
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

    public function setContactName(string $contactName): self
    {
        $this->contactName = $contactName;
        return $this;
    }

    public function getContactName(): string
    {
        return $this->contactName;
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

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getStreet(): string
    {
        return $this->street;
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

    public function setPostalBox(string $postalBox): self
    {
        $this->postalBox = $postalBox;
        return $this;
    }

    public function getPostalBox(): string
    {
        return $this->postalBox;
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

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
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

    public function setVatNumber(string $vatNumber): self
    {
        $this->vatNumber = $vatNumber;
        return $this;
    }

    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }

    public function setCocNumber(string $cocNumber): self
    {
        $this->cocNumber = $cocNumber;
        return $this;
    }

    public function getCocNumber(): string
    {
        return $this->cocNumber;
    }

    public function setEoriNumber(string $eoriNumber): self
    {
        $this->eoriNumber = $eoriNumber;
        return $this;
    }

    public function getEoriNumber(): string
    {
        return $this->eoriNumber;
    }
    
    public function __toArray(): array
    {
        return array_filter([
            "id" => $this->getId(),
            "company_name" => $this->getCompanyName(),
            "contact_name" => $this->getContactName(),
            "email" => $this->getEmail(),
            "telephone" => $this->getTelephone(),
            "street" => $this->getStreet(),
            "house_number" => $this->getHouseNumber(),
            "postal_box" => $this->getPostalBox(),
            "postal_code" => $this->getPostalCode(),
            "city" => $this->getCity(),
            "country" => $this->getCountry(),
            "vat_number" => $this->getVatNumber(),
            "coc_number" => $this->getCocNumber(),
            "eori_number" => $this->getEoriNumber(),
        ]);
    }
}