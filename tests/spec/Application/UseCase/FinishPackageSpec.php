<?php

namespace spec\App\Application\UseCase;

use App\Application\OrderSystemInterface;
use App\Application\UseCase\Command\FinishPackageCommand;
use App\Application\UseCase\FinishPackage;
use App\Domain\Order;
use App\Domain\Package;
use App\Domain\PackageRepositoryInterface;
use PhpSpec\ObjectBehavior;

class FinishPackageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FinishPackage::class);
    }

    public function let(PackageRepositoryInterface $packageRepository, OrderSystemInterface $orderSystem)
    {
        $this->beConstructedWith($packageRepository, $orderSystem);
    }

    public function it_finish_package(
        PackageRepositoryInterface $packageRepository,
        Package $package,
        Order $order,
        OrderSystemInterface $orderSystem
    ) {
        $packageId = 1337;
        $orderId = 2137;
        $command = new FinishPackageCommand($packageId);
        $packageRepository->getPackageById($packageId)->willReturn($package)->shouldBeCalledOnce();
        $package->finishPackage()->shouldBeCalledOnce();
        $package->getOrder()->willReturn($order);
        $order->getOrderId()->willReturn($orderId);
        $orderSystem->finishOrder($orderId)->shouldBeCalledOnce();
        $packageRepository->persist($package)->shouldBeCalledOnce();
        $this->execute($command);
    }
}
