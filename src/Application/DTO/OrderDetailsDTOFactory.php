<?php

declare(strict_types=1);

namespace App\Application\DTO;

use App\Domain\OrderProduct;
use App\Domain\Package;

class OrderDetailsDTOFactory
{
    public function createOrderDetailsDTO(Package $package): OrderDetailsDTO
    {
        $order = $package->getOrder();
        return new OrderDetailsDTO($package->getPackageType(), $this->getOrderProductsDetailsDTO($order->getProducts()));
    }

    /**
     * @param OrderProduct[] $orderProducts
     *
     * @return OrderDetailsProductDTO[]
     */
    private function getOrderProductsDetailsDTO(array $orderProducts): array
    {
        $orderDetailsProductDTO = [];
        foreach ($orderProducts as $orderProduct) {
            $orderDetailsProductDTO[] = new OrderDetailsProductDTO($orderProduct->getType(), $orderProduct->getWeight());
        }

        return $orderDetailsProductDTO;
    }
}
