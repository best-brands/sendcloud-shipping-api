<?php

namespace HarmSmits\SendCloudClient\Models;

class Country extends AModel
{
    protected string $iso3 = "";

    protected string $iso2 = "";

    protected string $name = "";

    public function setIso3(string $iso_3): self
    {
        $this->iso3 = $iso_3;
        return $this;
    }

    public function getIso3(): string
    {
        return $this->iso3;
    }

    public function setIso2(string $iso_2): self
    {
        $this->iso2 = $iso_2;
        return $this;
    }

    public function getIso2(): string
    {
        return $this->iso2;
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

    public function __toArray(): array
    {
        return array_filter([
            "iso_3" => $this->getIso3(),
            "iso_2" => $this->getIso2(),
            "name" => $this->getName()
        ]);
    }
}