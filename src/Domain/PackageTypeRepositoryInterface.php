<?php

namespace App\Domain;

interface PackageTypeRepositoryInterface
{
    public function getPackageTypesOrderedByWeight(): array;
}
