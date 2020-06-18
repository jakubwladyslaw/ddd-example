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

    /**
     * OrderProduct constructor.
     *
     * @param int    $id
     * @param int    $weight
     * @param string $type
     */
    public function __construct(int $id, int $weight, string $type)
    {
        $this->id = $id;
        $this->weight = $weight;
        $this->type = $type;
    }


    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
