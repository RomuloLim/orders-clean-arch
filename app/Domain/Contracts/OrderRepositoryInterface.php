<?php

declare(strict_types=1);


namespace App\Domain\Contracts;

use App\Domain\Entities\Order;

interface OrderRepositoryInterface
{
    public function create(Order $order): Order;
}
