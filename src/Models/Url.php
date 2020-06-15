<?php

namespace HarmSmits\SendCloudClient\Models;

class Url extends AModel
{
    protected string $url = "";

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function __toArray(): array
    {
        return [
            "url" => $this->getUrl()
        ];
    }
}