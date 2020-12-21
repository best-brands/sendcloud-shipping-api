<?php

namespace HarmSmits\SendCloudClient\Models;

use DateTime;
use HarmSmits\SendCloudClient\Exception\InvalidArgumentException;

class Refund extends AModel
{
    protected TypeCode $refundType;

    protected float $totalRefund = 0;

    protected ?\DateTime $refundedAt = null;

    protected string $message;

    public function __construct()
    {
        $this->refundType = new TypeCode();
    }

    public function setRefundType(TypeCode $code): self
    {
        $this->refundType = $code;
        return $this;
    }

    public function getRefundType(): TypeCode
    {
        return $this->refundType;
    }

    public function setTotalRefund(float $totalRefund): self
    {
        $this->totalRefund = $totalRefund;
        return $this;
    }

    public function getTotalRefund(): float
    {
        return $this->totalRefund;
    }

    public function setRefundedAt($refundedAt): self
    {
        if (is_string($refundedAt))
            $refundedAt = DateTime::createFromFormat("m-d-Y H:i:s", $date);

        if ($refundedAt instanceof DateTime) {
            $this->refundedAt = $refundedAt;
        } else {
            throw new InvalidArgumentException("Not a correct format");
        }

        return $this;
    }

    public function getRefundedAt(): ?DateTime
    {
        return $this->refundedAt;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function __toArray(): array
    {
        return [
            "refund_type" => $this->_convert($this->getRefundType()),
            "total_refund" => $this->getTotalRefund(),
            "refunded_at" => $this->getRefundedAt()
                ? $this->getRefundedAt()->format(DATE_ISO8601)
                : "",
            "message" => $this->getMessage()
        ];
    }
}