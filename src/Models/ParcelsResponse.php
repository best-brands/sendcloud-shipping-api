<?php

namespace HarmSmits\SendCloudClient\Models;

final class ParcelsResponse extends APagination
{
    /** @var ReducedParcel[] */
    private array $parcels = [];

    public function setParcels(array $parcels)
    {
        $this->_checkIfPureArray($parcels, ReducedParcel::class);
        $this->parcels = $parcels;
        return $this;
    }

    /**
     * @return \HarmSmits\SendCloudClient\Models\Parcel[]
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
