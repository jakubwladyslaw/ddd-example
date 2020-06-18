<?php


namespace App\Application;


interface OrderSystemInterface
{
    public function finishOrder(int $orderId): void;
}
