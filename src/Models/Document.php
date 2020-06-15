<?php

namespace HarmSmits\SendCloudClient\Models;

use HarmSmits\SendCloudClient\Exception\InvalidArgumentException;

class Document extends AModel
{
    const TYPE_LABEL = "label";
    const TYPE_CP71 = "cp71";
    const TYPE_CN23 = "cn23";
    const TYPE_COMMERCIAL_INVOICE = "commercial-invoice";
    const TYPE_CN23_DEFAULT = "cn23-default";

    const TYPES = [
        self::TYPE_LABEL,
        self::TYPE_CP71,
        self::TYPE_CN23,
        self::TYPE_COMMERCIAL_INVOICE,
        self::TYPE_CN23_DEFAULT
    ];

    /** @var string The type of the document. */
    protected string $type = "";

    /** @var string The paper size of the document, you can expect: a4 and a6. */
    protected string $size = "";

    /** @var string A link to the document, which allows downloading of the document in PDF, PNG and ZPL and various DPI */
    protected string $link = "";

    public function setType(string $type): self
    {
        if (!in_array($type, self::TYPES))
            throw new InvalidArgumentException("Not a valid type");

        $this->type = $type;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function __toArray(): array
    {
        return [
            "type" => $this->getType(),
            "size" => $this->getSize(),
            "link" => $this->getLink()
        ];
    }
}