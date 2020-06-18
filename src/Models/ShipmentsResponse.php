<?php

namespace HarmSmits\SendCloudClient\Models;

class ShipmentsResponse extends APagination
{
    protected array $results;

    public function setResults(array $results): self
    {
        $this->_checkIfPureArray($results, Shipment::class);
        $this->results = $results;
        return $this;
    }

    /**
     * @return Shipment[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    public function __toArray(): array
    {
        return [
            "next" => $this->getNext(),
            "previous" => $this->getPrevious(),
            "results" => $this->_convertPureArray($this->results)
        ];
    }
}