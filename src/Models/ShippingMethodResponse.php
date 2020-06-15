<?php

namespace HarmSmits\SendCloudClient\Models;

class ShippingMethodResponse extends AModel
{
    protected ?ShippingMethod $shippingMethod = null;

    public function setShippingMethod(ShippingMethod $shippingMethod): self
    {
        $this->shippingMethod = $shippingMethod;
        return $this;
    }

    public function getShippingMethod(): ?ShippingMethod
    {
        return $this->shippingMethod;
    }

    public function __toArray(): array
    {
        return [
            "parcel" => ($this->shippingMethod)
                ? $this->getShippingMethod()->__toArray()
                : false
            ,
        ];
    }
}