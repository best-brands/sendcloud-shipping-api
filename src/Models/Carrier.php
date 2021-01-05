<?php

namespace HarmSmits\SendCloudClient\Models;

class Carrier extends AModel
{
    protected ?string $code = null;

    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function __toArray(): array
    {
        return array_filter([
            "code" => $this->getCode(),
        ]);
    }
}