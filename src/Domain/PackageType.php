<?php

declare(strict_types=1);

namespace App\Domain;

class PackageType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $maxWeight;

    /**
     * @var string
     */
    private $name;

    public function canHandle(Order $order): bool
    {
        
    }

    public function getName(): string
    {
        return $this->name;
    }
}
