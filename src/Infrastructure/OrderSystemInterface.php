<?php


namespace App\Infrastructure;


interface OrderSystemInterface
{
    public function finishOrder(int $orderId): void;
}
