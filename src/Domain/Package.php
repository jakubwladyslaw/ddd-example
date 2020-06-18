<?php

declare(strict_types=1);

namespace App\Domain;

class Package
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var PackageLabel
     */
    private $label;

    /**
     * @var PackageType
     */
    private $type;

    /**
     * @var string
     */
    private $status;

    /**
     * @var Order
     */
    private $order;
}
