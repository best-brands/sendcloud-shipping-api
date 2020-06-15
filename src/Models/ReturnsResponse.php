<?php

namespace HarmSmits\SendCloudClient\Models;

final class ReturnsResponse extends AModel
{
    protected ?string $next = null;

    protected ?string $previous = null;

    /** @var \HarmSmits\SendCloudClient\Models\ReturnItem[] */
    private array $returns = [];

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

    public function setReturns(array $returns)
    {
        $this->_checkIfPureArray($returns, ReturnItem::class);
        $this->returns = $returns;
        return $this;
    }

    /**
     * @return \HarmSmits\SendCloudClient\Models\ReturnItem[]
     */
    public function getReturns(): array
    {
        return $this->returns;
    }

    public function __toArray(): array
    {
        return [
            "next" => $this->getNext(),
            "previous" => $this->getPrevious(),
            "returns" => $this->_convertPureArray($this->getReturns())
        ];
    }
}
