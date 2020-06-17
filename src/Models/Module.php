<?php

namespace HarmSmits\SendCloudClient\Models;

class Module extends AModel
{
    protected int $id = 0;

    protected bool $activated = false;

    protected string $name = "";

    protected string $shortName = "";

    protected array $settings = [];

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setActivated(bool $activated): self
    {
        $this->activated = $activated;
        return $this;
    }

    public function getActivated(): bool
    {
        return $this->activated;
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

    public function setShortName(string $shortName): self
    {
        $this->shortName = $shortName;
        return $this;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function setSettings(array $settings): self
    {
        $this->settings = $settings;
        return $this;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function __toArray(): array
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "settings" => $this->getSettings(),
            "activated" => $this->getActivated(),
            "short_name" => $this->getShortName()
        ];
    }
}
