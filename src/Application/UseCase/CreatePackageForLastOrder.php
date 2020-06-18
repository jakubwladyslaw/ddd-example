<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\OrderRepositoryInterface;
use App\Domain\PackageFactory;
use App\Domain\PackageRepositoryInterface;
use App\Domain\PackageTypeFinder;
use App\Domain\PackageTypeRepositoryInterface;

class CreatePackageForLastOrder
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var PackageTypeRepositoryInterface
     */
    private $packageTypeRepository;

    /**
     * @var PackageTypeFinder
     */
    private $packageTypeFinder;

    /**
     * @var PackageFactory
     */
    private $packageFactory;

    /**
     * @var PackageRepositoryInterface
     */
    private $packageRepository;

    public function execute()
    {
        $order = $this->orderRepository->getLastOrder();
        $packageTypes = $this->packageTypeRepository->getPackageTypes();
        $packageType = $this->packageTypeFinder->findPackageTypeForOrder($order, $packageTypes);
        $package = $this->packageFactory->createPackage($order, $packageType);
        $this->packageRepository->persist($package);
    }
}
