<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Order;

use App\Domain\Contracts\OrderRepositoryInterface;
use App\Domain\Entities\Order;
use App\Models\Order as OrderModel;

class EloquentOrderRepository implements OrderRepositoryInterface
{
    public function create(Order $order): Order
    {
        $eloquentOrder = OrderModel::create([
            'customer_id' => $order->customerId,
            'status' => $order->status,
        ]);

        return $this->toEntity($eloquentOrder);
    }

    private function toEntity(OrderModel $order): Order
    {
        return new Order(
            id: $order->id,
            customerId: $order->customer_id,
            status: $order->status,
        );
    }
}
