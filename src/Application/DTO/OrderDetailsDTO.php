<?php

declare(strict_types=1);

namespace App\Application\DTO;

class OrderDetailsDTO
{
    /**
     * @var string
     */
    private $packageTypeName;


    /**
     * @var OrderDetailsProductDTO[]
     */
    private $products;

    public function __construct(string $packageTypeName, array $products)
    {
        $this->packageTypeName = $packageTypeName;
        $this->products = $products;
    }
}
