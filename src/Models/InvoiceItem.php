<?php

namespace HarmSmits\SendCloudClient\Models;

class InvoiceItem extends AModel
{
    protected int $id;

    protected string $name;

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

    public function getName(): string
    {
        return $this;
    }

    public function __toArray(): array
    {
        return array_filter([
            "id" => $this->getId(),
            "name" => $this->getName()
        ]);
    }
}
