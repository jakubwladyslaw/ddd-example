<?php


namespace App\Application\UseCase;


use App\Application\UseCase\Command\FinishPackageCommand;
use App\Domain\Package;
use App\Domain\PackageRepositoryInterface;
use App\Application\OrderSystemInterface;

class FinishPackage
{
    /**
     * @var Package
     */
    private $package;

    /**
     * @var PackageRepositoryInterface
     */
    private $packageRepository;

    /**
     * @var OrderSystemInterface
     */
    private $orderSystem;

    public function execute(FinishPackageCommand $command): void
    {
        $package = $this->packageRepository->getPackageById($command->getPackageId());
        $package->finishPackage();
        $order = $package->getOrder();
        $this->orderSystem->finishOrder($order->getOrderId());
    }
}
