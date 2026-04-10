<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Application\Order\DTOs\CreateOrderInput;
use App\Domain\Enums\OrderStatus;

class Order
{
    public function __construct(
        public ?int $id,
        public int $customerId,
        public OrderStatus $status,
    ) {}

    public static function create(CreateOrderInput $addOrderDto): self
    {
        return new self(
            id: null,
            customerId: $addOrderDto->customerId,
            status: OrderStatus::OPEN,
        );
    }
}
