<?php


namespace App\Application\UseCase;


use App\Application\UseCase\Command\FinishPackageCommand;
use App\Domain\PackageRepositoryInterface;
use App\Infrastructure\OrderSystemInterface;

class FinishPackage
{
    /**
     * @var PackageRepositoryInterface
     */
    private $packageRepository;

    /**
     * @var OrderSystemInterface
     */
    private $orderSystem;

    /**
     * FinishPackage constructor.
     *
     * @param PackageRepositoryInterface $packageRepository
     * @param OrderSystemInterface       $orderSystem
     */
    public function __construct(PackageRepositoryInterface $packageRepository, OrderSystemInterface $orderSystem)
    {
        $this->packageRepository = $packageRepository;
        $this->orderSystem = $orderSystem;
    }

    public function execute(FinishPackageCommand $command): void
    {
        $package = $this->packageRepository->getPackageById($command->getPackageId());
        $package->finishPackage();
        $order = $package->getOrder();
        $this->orderSystem->finishOrder($order->getOrderId());
    }
}
