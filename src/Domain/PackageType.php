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

    /**
     * PackageType constructor.
     *
     * @param int    $id
     * @param int    $maxWeight
     * @param string $name
     */
    public function __construct(int $id, int $maxWeight, string $name)
    {
        $this->id = $id;
        $this->maxWeight = $maxWeight;
        $this->name = $name;
    }

    public function canHandle(Order $order): bool
    {
        $canHandle = false;

        if($order->getTotalOrderWeight() <= $this->getMaxWeight()) {

            $canHandle = true;
        }

        return $canHandle;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxWeight(): int
    {
        return $this->maxWeight;
    }
}
