<?php

declare(strict_types=1);

namespace App\Application\Order\UseCases;

use App\Application\Order\DTOs\CreateOrderDto;
use App\Application\Order\DTOs\CreateOrderOutput;
use App\Domain\Contracts\OrderRepositoryInterface;
use App\Domain\Entities\Order;
use RuntimeException;

class CreateOrderUseCase
{
    public function __construct(
        private readonly OrderRepositoryInterface $orderRepository,
    ) {}

    public function execute(CreateOrderDto $dto): CreateOrderOutput
    {
        $order = Order::create($dto);

        $order = $this->orderRepository->create($order);

        if ($order->id === null) {
            throw new RuntimeException('Unable to create order output without an ID.');
        }

        return new CreateOrderOutput(
            id: $order->id,
        );
    }
}
