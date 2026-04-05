<?php

declare(strict_types=1);


namespace App\Application\Order\UseCases;

use App\Domain\Contracts\OrderRepositoryInterface;
use App\Domain\Entities\Order;
use App\Domain\Enums\OrderStatus;

class CreateOrderUseCase
{
    public function __construct(
        private readonly OrderRepositoryInterface $orderRepository,
    )
    {
    }

    public function excecute(array $data): void
    {
        $order = new Order(
            customerId: $data['customer_id'],
            status: OrderStatus::OPEN,
        );

        $this->orderRepository->create($order);
    }
}
