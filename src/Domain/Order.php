<?php

declare(strict_types=1);

namespace App\Domain;

class Order
{
    /**
     * @var int
     */
    private $orderId;

    /**
     * @var OrderAddress
     */
    private $shippingAddress;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var bool
     */
    private $isPaid;

    /**
     * @var OrderProduct[]
     */
    private $products;

    /**
     * Order constructor.
     *
     * @param int          $orderId
     * @param OrderAddress $shippingAddress
     * @param \DateTime    $createdAt
     * @param bool         $isPaid
     * @param OrderProduct $products
     */
    public function __construct(int $orderId, OrderAddress $shippingAddress, \DateTime $createdAt, bool $isPaid, array $products)
    {
        $this->orderId = $orderId;
        $this->shippingAddress = $shippingAddress;
        $this->createdAt = $createdAt;
        $this->isPaid = $isPaid;
        $this->products = $products;
    }

    public function getTotalOrderWeight(): int
    {

    }

    public function isPaid(): bool
    {
        return $this->isPaid;
    }


}
