<?php

declare(strict_types=1);


namespace App\Domain\Entities;

class OrderItem
{
    public function __construct(
        public ?int $id = null,
        public int $orderId,
        public int $productId,
        public string $productName,
        public float $unitPrice,
        public int $quantity,
    )
    {
    }
}
