<?php

namespace HarmSmits\SendCloudClient\Models;

final class BrandsResponse extends APagination
{
    /** @var Brand[] */
    private array $brands = [];

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
        return array_filter([
            "next" => $this->getNext(),
            "previous" => $this->getPrevious(),
            "brands" => $this->_convertPureArray($this->getBrands())
        ]);
    }
}
