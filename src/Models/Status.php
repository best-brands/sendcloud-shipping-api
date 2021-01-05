<?php

namespace HarmSmits\SendCloudClient\Models;

class Status extends AModel
{
    protected string $status = "";

    protected string $message = "";

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function __toArray(): array
    {
        return array_filter([
            "status" => $this->getStatus(),
            "message" => $this->getMessage()
        ]);
    }
}