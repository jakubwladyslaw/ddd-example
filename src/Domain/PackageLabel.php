<?php

declare(strict_types=1);

namespace App\Domain;

class PackageLabel
{
    /**
     * @var string
     */
    private $label;

    /**
     * PackageLabel constructor.
     *
     * @param string $label
     */
    public function __construct(string $label)
    {
        $this->label = $label;
    }

    public function getLabel(): string
    {

    }
}
