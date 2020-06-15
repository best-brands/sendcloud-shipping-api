<?php

namespace HarmSmits\SendCloudClient\Models;

final class BrandsResponse extends AModel
{
    protected ?string $next = null;

    protected ?string $previous = null;

    /** @var Brand[] */
    private array $brands = [];

    public function setNext(string $cursor): self
    {
        if (strpos($cursor, "http") !== false) {
            $queries = [];
            $parts = parse_url($cursor);
            parse_str($parts["query"], $queries);
            $cursor = $queries["cursor"];
        }

        $this->next = $cursor;
        return $this;
    }

    public function getNext(): ?string
    {
        return $this->next;
    }

    public function setPrevious(string $cursor): self
    {
        if (strpos($cursor, "http") !== false) {
            $queries = [];
            $parts = parse_url($cursor);
            parse_str($parts["query"], $queries);
            $cursor = $queries["cursor"];
        }

        $this->previous = $cursor;
        return $this;
    }

    public function getPrevious(): ?string
    {
        return $this->previous;
    }

    public function setBrands(array $brands)
    {
        $this->_checkIfPureArray($brands, Brand::class);
        $this->brands = $brands;
        return $this;
    }

    /**
     * @return \HarmSmits\SendCloudClient\Models\Brand[]
     */
    public function getBrands(): array
    {
        return $this->brands;
    }

    public function __toArray(): array
    {
        return [
            "next" => $this->getNext(),
            "previous" => $this->getPrevious(),
            "brands" => $this->_convertPureArray($this->getBrands())
        ];
    }
}
