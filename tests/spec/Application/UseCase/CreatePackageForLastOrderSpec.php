<?php

namespace spec\App\Application\UseCase;

use App\Application\DTO\OrderDetailsDTOFactory;
use App\Application\UseCase\CreatePackageForLastOrder;
use App\Domain\Order;
use App\Domain\OrderRepositoryInterface;
use App\Domain\Package;
use App\Domain\PackageFactory;
use App\Domain\PackageRepositoryInterface;
use App\Domain\PackageType;
use App\Domain\PackageTypeFinder;
use App\Domain\PackageTypeRepositoryInterface;
use PhpSpec\ObjectBehavior;

class CreatePackageForLastOrderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CreatePackageForLastOrder::class);
    }

    public function let(
        OrderRepositoryInterface $orderRepository,
        PackageTypeRepositoryInterface $packageTypeRepository,
        PackageTypeFinder $packageTypeFinder,
        PackageFactory $packageFactory,
        PackageRepositoryInterface $packageRepository,
        OrderDetailsDTOFactory $orderDetailsDTOFactory
    ) {
        $this->beConstructedWith(
            $orderRepository,
            $packageTypeRepository,
            $packageTypeFinder,
            $packageFactory,
            $packageRepository,
            $orderDetailsDTOFactory
        );
    }

    public function it_create_package_and_return_order_details_dto(
        OrderRepositoryInterface $orderRepository,
        Order $order,
        PackageTypeRepositoryInterface $packageTypeRepository,
        PackageType $packageType1,
        PackageType $packageType2,
        Package $package,
        PackageFactory $packageFactory,
        PackageTypeFinder $packageTypeFinder,
        PackageRepositoryInterface $packageRepository,
        OrderDetailsDTOFactory $orderDetailsDTOFactory
    ) {
        $packageTypes = [$packageType1, $packageType2];
        $orderRepository->getLastOrder()->willReturn($order);
        $packageTypeRepository->getPackageTypesOrderedByWeight()->willReturn($packageTypes)->shouldBeCalledOnce();

        $packageTypeFinder->findPackageTypeForOrder($order, $packageTypes)->willReturn($packageType1)->shouldBeCalledOnce();

        $packageFactory->createPackage($order, $packageType1)->willReturn($package)->shouldBeCalledOnce();
        $packageRepository->persist($package)->shouldBeCalledOnce();
        $orderDetailsDTOFactory->createOrderDetailsDTO($package)->shouldBeCalledOnce();
        $this->execute();
    }
}
