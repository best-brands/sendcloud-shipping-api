<?php

namespace HarmSmits\SendCloudClient\Models;

use HarmSmits\SendCloudClient\Exception\InvalidArgumentException;

class ParcelItem extends AModel
{
    protected string $description = "";

    protected string $hsCode = "";

    protected string $originCountry = "";

    protected string $productId = "";

    protected array $properties = [];

    protected int $quantity = 0;

    protected string $sku = "";

    protected string $value = "";

    protected string $weight = "";

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setHsCode(string $hsCode): self
    {
        $this->hsCode = $hsCode;
        return $this;
    }

    public function getHsCode(): string
    {
        return $this->hsCode;
    }

    public function setOriginCountry(string $originCountry): self
    {
        $this->originCountry = $originCountry;
        return $this;
    }

    public function getOriginCountry(): string
    {
        return $this->originCountry;
    }

    public function setProductId(string $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function setProperties(array $properties): self
    {
        array_walk($properties, function ($property) {
            if (!is_string($property) && !is_int($property) && !is_float($property))
                throw new InvalidArgumentException("Not a proper type for a property");
        });
        $this->properties = $properties;
        return $this;
    }

    public function addProperty(string $key, $property): self
    {
        if (!is_string($property) && !is_int($property) && !is_float($property))
            throw new InvalidArgumentException("Not a proper type for a property");
        $this->properties[$key] = $property;
        return $this;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
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
            "description" => $this->getDescription(),
            "hs_code" => $this->getHsCode(),
            "origin_country" => $this->getOriginCountry(),
            "product_id" => $this->getProductId(),
            "properties" => $this->getProperties(),
            "quantity" => $this->getQuantity(),
            "sku" => $this->getSku(),
            "value" => $this->getValue(),
            "weight" => $this->getWeight()
        ]);
    }
}
