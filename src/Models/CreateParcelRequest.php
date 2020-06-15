<?php

namespace HarmSmits\SendCloudClient\Models;

class CreateParcelRequest extends AModel
{
    protected ?Parcel $parcel = null;

    public function setParcel(Parcel $parcel): self
    {
        $this->parcel = $parcel;
        return $this;
    }

    public function getParcel(): ?Parcel
    {
        return $this->parcel;
    }

    public function __toArray(): array
    {
        return [
            "parcel" => $this->getParcel()->__toArray(),
        ];
    }
}