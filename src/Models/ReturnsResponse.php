<?php

namespace HarmSmits\SendCloudClient\Models;

final class ReturnsResponse extends APagination
{
      /** @var \HarmSmits\SendCloudClient\Models\ReturnItem[] */
    private array $returns = [];

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
        return array_filter([
            "next" => $this->getNext(),
            "previous" => $this->getPrevious(),
            "returns" => $this->_convertPureArray($this->getReturns())
        ]);
    }
}
