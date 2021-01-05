<?php

namespace HarmSmits\SendCloudClient\Models;

class ParcelShipment extends AModel
{
    protected int $id = 0;

    protected ?string $name = null;

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

    public function __toArray(): array
    {
        return array_filter([
            "id" => $this->getId(),
            "name" => $this->getName()
        ]);
    }
}