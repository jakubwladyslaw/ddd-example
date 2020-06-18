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
     * @var string
     */
    private $label;

    /**
     * @var OrderDetailsProductDTO[]
     */
    private $products;

    public function __construct(string $packageTypeName, string $label, array $products)
    {
        $this->packageTypeName = $packageTypeName;
        $this->label = $label;
        $this->products = $products;
    }
}
