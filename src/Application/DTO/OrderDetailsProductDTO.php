<?php

declare(strict_types=1);

namespace App\Application\DTO;

class OrderDetailsProductDTO
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $weight;

    public function __construct(string $type, int $weight)
    {
        $this->type = $type;
        $this->weight = $weight;
    }
}
