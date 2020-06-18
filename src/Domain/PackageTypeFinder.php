<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\exception\NoMatchingPackageTypeFound;

class PackageTypeFinder
{
    public function findPackageTypeForOrder(Order $order, array $packageTypes): PackageType
    {
        foreach ($packageTypes as $packageType) {
            if ($packageType->canHandle($order)) {
               return $packageType;
            }
        }

        throw new NoMatchingPackageTypeFound("Order to big! No proper package found for order.");
    }
}
