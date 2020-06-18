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
     * @var OrderProduct
     */
    private $products;

    public function getTotalOrderWeight(): int
    {
    }
}
