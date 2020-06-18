<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\exception\NoMatchingPackageTypeFound;

class PackageTypeFinder
{
    /**
     * @param Order $order
     * @param PackageType[] $packageTypes
     *
     * @return PackageType
     * @throws NoMatchingPackageTypeFound
     */
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
