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
     * @var PackageLabel
     */
    private $label;

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

    public function __construct(int $id, PackageLabel $label, PackageType $type, string $status, Order $order)
    {
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->status = $status;
        $this->order = $order;
    }

    public function getPackageType(): string
    {
        return $this->type->getName();
    }

    public function getOrderAddressLine()
    {
        $this->order->
    }

}
