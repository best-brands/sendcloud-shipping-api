<?php

namespace HarmSmits\SendCloudClient\Models;

class ParcelStatus extends AModel
{
    protected int $id = 0;

    protected ?string $message = null;

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function __toArray(): array
    {
        return [
            "id" => $this->getId(),
            "message" => $this->getMessage()
        ];
    }
}