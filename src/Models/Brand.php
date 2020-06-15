<?php

namespace HarmSmits\SendCloudClient\Models;

class Brand extends AModel
{
    protected int $id = 0;

    protected string $name = "";

    protected string $color = "#fff";

    protected string $secondaryColor = "#fff";

    protected string $website = "";

    protected array $overlayLogo = [];

    protected Url $screenLogo;

    protected Url $printLogo;

    protected ?string $overlayThumb = "";

    protected string $screenThumb = "";

    protected string $printThumb = "";

    protected int $notifyReplyToEmail = 0;

    protected string $domain = "";

    protected int $notifyBccEmail = 0;

    protected bool $hidePoweredBy = false;

    public function __construct()
    {
        $this->screenLogo = new Url();
        $this->printLogo = new Url();
    }

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
        return $this->name;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setSecondaryColor(string $secondaryColor): self
    {
        $this->secondaryColor = $secondaryColor;
        return $this;
    }

    public function getSecondaryColor(): string
    {
        return $this->secondaryColor;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;
        return $this;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function setOverlayLogo(array $overlayLogo): self
    {
        $this->overlayLogo = $overlayLogo;
        return $this;
    }

    public function getOverlayLogo(): array
    {
        return $this->overlayLogo;
    }

    public function setScreenLogo(Url $screenLogo): self
    {
        $this->screenLogo = $screenLogo;
        return $this;
    }

    public function getScreenLogo(): Url
    {
        return $this->screenLogo;
    }

    public function setPrintLogo(Url $printLogo): self
    {
        $this->printLogo = $printLogo;
        return $this;
    }

    public function getPrintLogo(): Url
    {
        return $this->printLogo;
    }

    public function setOverlayThumb(string $overlayThumb): self
    {
        $this->overlayThumb = $overlayThumb;
        return $this;
    }

    public function getOverlayThumb(): ?string
    {
        return $this->overlayThumb;
    }

    public function setScreenThumb(string $screenThumb): self
    {
        $this->screenThumb = $screenThumb;
        return $this;
    }

    public function getScreenThumb(): string
    {
        return $this->screenThumb;
    }

    public function setPrintThumb(string $printThumb): self
    {
        $this->printThumb = $printThumb;
        return $this;
    }

    public function getPrintThumb(): string
    {
        return $this->printThumb;
    }

    public function setNotifyReplyToEmail(int $notifyReplyToEmail): self
    {
        $this->notifyReplyToEmail = $notifyReplyToEmail;
        return $this;
    }

    public function getNotifyReplyToEmail(): int
    {
        return $this->notifyReplyToEmail;
    }

    public function setDomain(string $domain): self
    {
        $this->domain = $domain;
        return $this;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function setNotifyBccEmail(int $notifyBccEmail): self
    {
        $this->notifyBccEmail = $notifyBccEmail;
        return $this;
    }

    public function getNotifyBccEmail(): int
    {
        return $this->notifyBccEmail;
    }

    public function setHidePoweredBy(bool $hidePoweredBy): self
    {
        $this->hidePoweredBy = $hidePoweredBy;
        return $this;
    }

    public function getHidePoweredBy(): bool
    {
        return $this->hidePoweredBy;
    }

    public function __toArray(): array
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "color" => $this->getColor(),
            "secondary_color" => $this->getSecondaryColor(),
            "website" => $this->getWebsite(),
            "overlay_logo" => $this->getOverlayLogo(),
            "screen_logo" => $this->getScreenLogo()->__toArray(),
            "print_logo" => $this->getPrintLogo()->__toArray(),
            "overlay_thumb" => $this->getOverlayThumb(),
            "screen_thumb" => $this->getScreenThumb(),
            "print_thumb" => $this->getPrintThumb(),
            "notify_reply_to_email" => $this->getNotifyReplyToEmail(),
            "domain" => $this->getDomain(),
            "notify_bcc_email" => $this->getNotifyBccEmail(),
            "hide_powered_by" => $this->getHidePoweredBy()
        ];
    }
}