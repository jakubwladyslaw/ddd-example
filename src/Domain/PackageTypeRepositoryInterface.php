<?php

namespace App\Domain;

interface PackageTypeRepositoryInterface
{
    public function getPackageTypes(): array;
}
