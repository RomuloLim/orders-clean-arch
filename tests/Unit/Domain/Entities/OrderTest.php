<?php

namespace Tests\Unit\Domain\Entities;

use App\Application\Order\DTOs\CreateOrderDto;
use App\Domain\Entities\Order;
use App\Domain\Enums\OrderStatus;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function test_create_order_with_open_status()
    {
        $dto = new CreateOrderDto(
            customerId: 1,
        );

        $order = Order::create($dto);

        $this->assertNull($order->id);
        $this->assertEquals(1, $order->customerId);
        $this->assertSame(OrderStatus::OPEN, $order->status);
    }
}
