<?php

namespace HarmSmits\SendCloudClient\Models;

class GlobalStatus extends Status
{
    protected string $globalStatusSlug = "";

    public function setGlobalStatusSlug(string $globalStatusSlug): self
    {
        $this->globalStatusSlug = $globalStatusSlug;
        return $this;
    }

    public function getGlobalStatusSlug(): string
    {
        return $this->globalStatusSlug;
    }

    public function __toArray(): array
    {
        return array_filter([
            "status" => $this->getStatus(),
            "message" => $this->getMessage(),
            "global_status_slug" => $this->getGlobalStatusSlug()
        ]);
    }
}