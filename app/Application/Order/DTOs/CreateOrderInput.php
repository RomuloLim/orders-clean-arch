<?php

declare(strict_types=1);

namespace App\Application\Order\DTOs;

class CreateOrderInput
{
    public function __construct(
        public int $customerId,
    ) {}
}
