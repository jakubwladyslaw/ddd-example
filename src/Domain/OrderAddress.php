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

    /**
     * OrderAddress constructor.
     *
     * @param string      $street
     * @param string      $houseNumber
     * @param string|null $apartmentNumber
     * @param string      $city
     */
    public function __construct(string $street, string $houseNumber, ?string $apartmentNumber, string $city)
    {
        $this->street = $street;
        $this->houseNumber = $houseNumber;
        $this->apartmentNumber = $apartmentNumber;
        $this->city = $city;
    }

    public function getAddressLine(): string
    {

    }
}
