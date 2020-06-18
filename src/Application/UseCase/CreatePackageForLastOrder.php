<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Application\DTO\OrderDetailsDTO;
use App\Application\DTO\OrderDetailsDTOFactory;
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

    /**
     * @var OrderDetailsDTOFactory
     */
    private $orderDetailsDTOFactory;

    public function execute(): OrderDetailsDTO
    {
        $order = $this->orderRepository->getLastOrder();
        $packageTypes = $this->packageTypeRepository->getPackageTypesOrderedByWeight();
        $packageType = $this->packageTypeFinder->findPackageTypeForOrder($order, $packageTypes);
        $package = $this->packageFactory->createPackage($order, $packageType);
        $this->packageRepository->persist($package);

        return $this->orderDetailsDTOFactory->createOrderDetailsDTO($package);
    }
}
