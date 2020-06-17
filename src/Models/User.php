<?php

namespace HarmSmits\SendCloudClient\Models;

use DateTime;
use HarmSmits\SendCloudClient\Exception\InvalidArgumentException;

class User extends AModel
{
    protected string $address;

    protected string $city;

    protected string $companyLogo;

    protected string $companyName;

    protected array $data;

    protected string $email;

    protected array $invoices;

    protected array $modules;

    protected string $postalCode;

    protected \DateTime $registered;

    protected string $telephone;

    protected string $username;

    public function __construct()
    {
        $this->registered = new DateTime;
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

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCompanyLogo(string $companyLogo): self
    {
        $this->companyLogo = $companyLogo;
        return $this;
    }

    public function getCompanyLogo(): string
    {
        return $this->companyLogo;
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

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
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

    public function setInvoices(array $invoices): self
    {
        $this->_checkIfPureArray($invoices, Invoice::class);
        $this->invoices = $invoices;
        return $this;
    }

    /**
     * @return Invoice[]
     */
    public function getInvoices(): array
    {
        return $this->invoices;
    }

    public function setModules(array $modules): self
    {
        $this->_checkIfPureArray($modules, Module::class);
        $this->modules = $modules;
        return $this;
    }

    public function getModules(): array
    {
        return $this->modules;
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

    public function setRegistered($registered): self
    {
        if (is_string($registered))
            $registered = DateTime::createFromFormat("Y-m-d H:i:s", $registered);

        if ($registered instanceof DateTime) {
            $this->registered = $registered;
        } else {
            throw new InvalidArgumentException("Not a correct format");
        }

        return $this;
    }

    public function getRegistered(): ?DateTime
    {
        return $this->registered;
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

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function __toArray(): array
    {
        return [
            "address" => $this->getAddress(),
            "city" => $this->getCity(),
            "company_logo" => $this->getCompanyLogo(),
            "company_name" => $this->getCompanyName(),
            "data" => $this->getData(),
            "email" => $this->getEmail(),
            "invoices" => $this->_convertPureArray($this->getInvoices()),
            "modules" => $this->_convertPureArray($this->getModules()),
            "postal_code" => $this->getPostalCode(),
            "registered" => $this->getRegistered(),
            "telephone" => $this->getTelephone(),
            "username" => $this->getUsername()
        ];
    }
}