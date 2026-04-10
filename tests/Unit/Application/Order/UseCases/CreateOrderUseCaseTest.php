<?php

namespace Tests\Unit\Application\Order\UseCases;

use App\Application\Order\DTOs\CreateOrderInput;
use App\Application\Order\DTOs\CreateOrderOutput;
use App\Application\Order\UseCases\CreateOrderUseCase;
use App\Domain\Contracts\OrderRepositoryInterface;
use App\Domain\Entities\Order;
use App\Domain\Enums\OrderStatus;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class CreateOrderUseCaseTest extends TestCase
{
    public function test_execute_returns_create_order_output_with_created_order_id(): void
    {
        $useCase = new CreateOrderUseCase(new FakeOrderRepository(15));

        $output = $useCase->execute(new CreateOrderInput(customerId: 10));

        $this->assertInstanceOf(CreateOrderOutput::class, $output);
        $this->assertSame(15, $output->id);
    }

    public function test_execute_throws_exception_when_repository_returns_order_without_id(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Unable to create order output without an ID.');

        $useCase = new CreateOrderUseCase(new FakeOrderRepository(null));

        $useCase->execute(new CreateOrderInput(customerId: 10));
    }
}

class FakeOrderRepository implements OrderRepositoryInterface
{
    public function __construct(
        private readonly ?int $generatedId,
    ) {}

    public function create(Order $order): Order
    {
        return new Order(
            id: $this->generatedId,
            customerId: $order->customerId,
            status: OrderStatus::OPEN,
        );
    }
}
