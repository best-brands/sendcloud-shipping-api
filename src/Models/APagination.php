<?php

namespace HarmSmits\SendCloudClient\Models;

abstract class APagination extends AModel
{
    protected ?string $next = null;

    protected ?string $previous = null;

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
}