<?php

declare(strict_types=1);

namespace App\Domain;

class Package
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var PackageType
     */
    private $type;

    /**
     * @var string
     */
    private $status;

    /**
     * @var Order
     */
    private $order;

    public function __construct(PackageType $type, string $status, Order $order)
    {
        $this->type = $type;
        $this->status = $status;
        $this->order = $order;
    }

    public function getPackageType(): string
    {
        return $this->type->getName();
    }

    public function getOrderAddressLine(): string
    {
        return $this->order->getAddressLine();
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function finishPackage()
    {
        $this->status = PackageStatus::FINISHED;
    }
}
