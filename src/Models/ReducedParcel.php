<?php

namespace HarmSmits\SendCloudClient\Models;

use \DateTime;
use HarmSmits\SendCloudClient\Exception\InvalidArgumentException;

class ReducedParcel extends AModel
{
    protected int $id = 0;

    protected ?string $name = null;

    protected ?string $companyName = null;

    protected ?string $address = null;

    protected ?ParcelAddressDivided $addressDivided = null;

    protected ?string $city = null;

    protected ?string $postalCode = null;

    protected ?string $telephone = null;

    protected ?string $email = null;

    protected DateTime $dateCreated;

    protected ?string $trackingNumber = null;

    protected float $weight = 0.0;

    protected array $label = [];

    protected ?ParcelStatus $status = null;

    protected array $data;

    protected ?Country $country = null;

    protected ?ParcelShipment $shipment = null;

    public function __construct()
    {
        $this->dateCreated = new DateTime();
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

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddressDivided(ParcelAddressDivided $addressDivided): self
    {
        $this->addressDivided = $addressDivided;
        return $this;
    }

    public function getAddressDivided(): ParcelAddressDivided
    {
        return $this->addressDivided;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
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

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setDateCreated($date): self
    {
        if (is_string($date))
            $date = DateTime::createFromFormat("m-d-Y H:i:s", $date);

        if ($date instanceof DateTime) {
            $this->dateCreated = $date;
        } else {
            throw new InvalidArgumentException("Not a correct format");
        }

        return $this;
    }

    public function getDateCreated(): ?DateTime
    {
        return $this->dateCreated;
    }

    public function setTrackingNumber(string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
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

    public function setLabel(array $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel(): array
    {
        return $this->label;
    }

    public function setStatus(ParcelStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus(): ?ParcelStatus
    {
        return $this->status;
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

    public function setCountry(Country $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setShipment(ParcelShipment $shipment): self
    {
        $this->shipment = $shipment;
        return $this;
    }

    public function getShipment(): ?ParcelShipment
    {
        return $this->shipment;
    }

    public function __toArray(): array
    {
        return [
            "id" => $this->getid(),
            "name" => $this->getName(),
            "company_name" => $this->getCompanyName(),
            "address" => $this->getAddress(),
            "address_divided" => $this->getAddressDivided()->__toArray(),
            "city" => $this->getCity(),
            "postal_code" => $this->getPostalCode(),
            "telephone" => $this->getTelephone(),
            "email" => $this->getEmail(),
            "date_created" => $this->getDateCreated()->format(DATE_ISO8601),
            "tracking_number" => $this->getTrackingNumber(),
            "weight" => $this->getWeight(),
            "label" => $this->getLabel(),
            "status" => $this->getStatus()->__toArray(),
            "data" => $this->getData(),
            "country" => $this->getCountry()->__toArray(),
            "shipment" => $this->getShipment()->__toArray()
        ];
    }
}