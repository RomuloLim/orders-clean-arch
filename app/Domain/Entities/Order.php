<?php

declare(strict_types=1);


namespace App\Domain\Entities;

use App\Domain\Enums\OrderStatus;

class Order
{
    public function __construct(
        public ?int $id = null,
        public int $customerId,
        public OrderStatus $status,
        public array $items = [],
    )
    {}
}
