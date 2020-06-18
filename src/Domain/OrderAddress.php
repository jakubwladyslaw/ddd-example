<?php

declare(strict_types=1);

namespace App\Domain;

class OrderAddress
{
    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $houseNumber;

    /**
     * @var null|string
     */
    private $apartmentNumber;

    /**
     * @var string
     */
    private $city;
}
