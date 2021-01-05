<?php

namespace HarmSmits\SendCloudClient\Models;

class Label extends AModel
{
    protected array $normalPrinter = [];

    protected string $labelPrinter = "";

    public function setNormalPrinter(array $links): self
    {
        $this->normalPrinter = $links;
        return $this;
    }

    public function getNormalPrinter(): array
    {
        return $this->normalPrinter;
    }

    public function addNormalPrinter(string $normalPrinter): self
    {
        $this->normalPrinter[] = $normalPrinter;
        return $this;
    }

    public function setLabelPrinter(string $labelPrinter): self
    {
        $this->labelPrinter = $labelPrinter;
        return $this;
    }

    public function getLabelPrinter(): string
    {
        return $this->labelPrinter;
    }

    public function __toArray(): array
    {
        return array_filter([
            "normal_printer" => $this->getNormalPrinter(),
            "labelPrinter" => $this->getLabelPrinter()
        ]);
    }
}