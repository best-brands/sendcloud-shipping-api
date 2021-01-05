<?php

namespace HarmSmits\SendCloudClient\Models;

class LabelDocument extends AModel
{
    protected ?Label $label = null;

    protected array $customsDeclaration = [];

    public function setLabel(Label $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel(): ?Label
    {
        return $this->label;
    }

    public function setCustomsDeclaration(array $customsDeclaration): self
    {
        $this->customsDeclaration = $customsDeclaration;
        return $this;
    }

    public function getCustomsDeclaration(): array
    {
        return $this->customsDeclaration;
    }

    public function __toArray(): array
    {
        return array_filter([
            "label" => ($this->getLabel()) ? $this->getLabel()->__toArray() : [],
            "customs_declaration" => $this->getCustomsDeclaration()
        ]);
    }
}