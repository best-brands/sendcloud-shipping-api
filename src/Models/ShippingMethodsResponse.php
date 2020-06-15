<?php

namespace HarmSmits\SendCloudClient\Models;

class ShippingMethodsResponse extends AModel
{
    protected array $shippingMethods = [];

    public function setShippingMethods(array $shippingMethods): self
    {
        $this->_checkIfPureArray($shippingMethods, ShippingMethod::class);
        $this->shippingMethods = $shippingMethods;
        return $this;
    }

    public function getShippingMethods(): array
    {
        return $this->shippingMethods;
    }

    public function addShippingMethod(ShippingMethod $shippingMethod): self
    {
        $this->shippingMethods[] = $shippingMethod;
        return $this;
    }

    public function __toArray(): array
    {
        return [
            "shipping_methods" => $this->_convertPureArray($this->getShippingMethods())
        ];
    }
}