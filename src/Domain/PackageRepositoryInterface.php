<?php

declare(strict_types=1);

namespace App\Domain;

interface PackageRepositoryInterface
{
    public function persist(Package $package): void;

    public function getPackageById(int $id): Package;
}
