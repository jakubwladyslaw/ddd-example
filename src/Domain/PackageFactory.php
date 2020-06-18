<?php

declare(strict_types=1);

namespace App\Domain;

class PackageFactory
{
    public function createPackage(Order $order, PackageType $packageType): Package
    {
        return new Package($packageType, PackageStatus::CREATED, $order);
    }
}
