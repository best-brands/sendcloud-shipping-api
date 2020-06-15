<?php

namespace HarmSmits\SendCloudClient\Models;

final class ParcelsResponse extends AModel
{
    protected ?string $next = null;

    protected ?string $previous = null;

    /** @var ReducedParcel[] */
    private array $parcels = [];

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

    public function setParcels(array $parcels)
    {
        $this->_checkIfPureArray($parcels, ReducedParcel::class);
        $this->parcels = $parcels;
        return $this;
    }

    /**
     * @return \HarmSmits\SendCloudClient\Models\ReducedParcel[]
     */
    public function getParcels(): array
    {
        return $this->parcels;
    }

    public function __toArray(): array
    {
        return [
            "next" => $this->getNext(),
            "previous" => $this->getPrevious(),
            "parcels" => $this->_convertPureArray($this->getParcels())
        ];
    }
}
