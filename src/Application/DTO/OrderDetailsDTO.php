<?php

declare(strict_types=1);

namespace App\Application\DTO;

class OrderDetailsDTO
{
    /**
     * @var string
     */
    private $packageType;

    /**
     * @var string
     */
    private $label;

    /**
     * @var OrderDetailsProductDTO[]
     */
    private $products;
}
