<?php

namespace App\Domain;

interface OrderRepositoryInterface
{
    public function getLastOrder(): Order;
}
