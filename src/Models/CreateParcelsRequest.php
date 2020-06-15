<?php

namespace HarmSmits\SendCloudClient\Models;

class CreateParcelsRequest extends AModel
{
    protected array $parcels = [];

    public function setParcels(array $parcels): self
    {
        $this->_checkIfPureArray($parcels, NewParcel::class);
        $this->parcels = $parcels;
        return $this;
    }

    public function getParcels(): array
    {
        return $this->parcels;
    }

    public function addParcel(NewParcel $parcel): self
    {
        $this->parcels[] = $parcel;
        return $this;
    }

    public function __toArray(): array
    {
        return [
            "parcels" => $this->_convertPureArray($this->getParcels())
        ];
    }
}