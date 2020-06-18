<?php

declare(strict_types=1);

namespace App\Domain;

class OrderProduct
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var string
     */
    private $type;

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
