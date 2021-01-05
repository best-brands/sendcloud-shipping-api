<?php

namespace HarmSmits\SendCloudClient\Models;

use DateTime;
use HarmSmits\SendCloudClient\Exception\InvalidArgumentException;

class Invoice extends AModel
{
    protected DateTime $date;

    protected int $id = 0;

    protected bool $isPayed = false;

    protected array $items = [];

    protected float $priceExcl = 0;

    protected float $priceIncl = 0;

    protected string $ref = "";

    protected string $type = "periodic";

    public function __construct()
    {
        $this->date = new DateTime();
    }

    public function setDate($date): self
    {
        if (is_string($date))
            $date = DateTime::createFromFormat("d-m-Y H:i:s", $date);

        if ($date instanceof DateTime) {
            $this->date = $date;
        } else {
            throw new InvalidArgumentException("Not a correct format");
        }

        return $this;
    }

    public function getDate(): ?DateTime
    {
        return $this->date;
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

    public function setIsPayed(bool $isPayed): self
    {
        $this->isPayed = $isPayed;
        return $this;
    }

    public function getIsPayed(): bool
    {
        return $this->isPayed;
    }

    public function setItems($items): self
    {
        if (is_array($items)) {
            $this->_checkIfPureArray($items, InvoiceItem::class);
            $this->items = $items;
        }
        return $this;
    }

    /**
     * @return InvoiceItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function setPriceExcl(float $priceExcl): self
    {
        $this->priceExcl = $priceExcl;
        return $this;
    }

    public function getPriceExcl(): float
    {
        return $this->priceExcl;
    }

    public function setPriceIncl(float $priceIncl): self
    {
        $this->priceIncl = $priceIncl;
        return $this;
    }

    public function getPriceIncl(): float
    {
        return $this->priceIncl;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;
        return $this;
    }

    public function getRef(): string
    {
        return $this->ref;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function __toArray(): array
    {
        return array_filter([
            "date" => $this->getDate(),
            "id" => $this->getId(),
            "isPayed" => $this->getIsPayed(),
            "items" => $this->_convertPureArray($this->getItems()),
            "price_excl" => $this->getPriceExcl(),
            "price_incl" => $this->getPriceIncl(),
            "ref" => $this->getRef(),
            "type" => $this->getType()
        ]);
    }
}
