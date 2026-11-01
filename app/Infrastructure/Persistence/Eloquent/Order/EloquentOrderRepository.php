<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Eloquent\Order;

use App\Domain\Contracts\OrderRepositoryInterface;
use App\Domain\Entities\Order as OrderEntity;
use App\Models\Order;

class EloquentOrderRepository implements OrderRepositoryInterface
{
    public function create(OrderEntity $order): OrderEntity
    {
        $eloquentOrder = Order::create([
            'customer_id' => $order->customerId,
            'status' => $order->status,
        ]);

        return $this->toEntity($eloquentOrder);
    }

    private function toEntity(Order $order): OrderEntity
    {
        return new OrderEntity(
            id: $order->id,
            customerId: $order->customer_id,
            status: $order->status,
        );
    }
}
