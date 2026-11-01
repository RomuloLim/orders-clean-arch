# Orders Clean Arch

A study project that models an order domain in Laravel following Clean Architecture. The goal is to keep business rules independent from the framework and the database.

> **Status: work in progress.** Order creation works from the use case down to Eloquent, with unit tests. The controller is written but its route is not registered yet, and order items are modeled but not connected to the order.

## Stack

- PHP 8.3+ and Laravel 13
- Laravel Sanctum
- PostgreSQL 18, via Laravel Sail (Docker)
- PHPUnit

## Architecture

```
app/
├── Domain/                 Entities, enums and contracts, free of Laravel
│   ├── Entities/           Order, OrderItem
│   ├── Enums/              OrderStatus
│   └── Contracts/          OrderRepositoryInterface
├── Application/            Use cases and their input/output DTOs
│   └── Order/
│       ├── DTOs/           CreateOrderInput, CreateOrderOutput
│       └── UseCases/       CreateOrderUseCase
├── Http/                   Controllers and API resources
│   ├── Controllers/Api/Order/CreateOrderController.php
│   └── Resources/Order/CreateOrderResource.php
└── Infrastructure/         Framework and database details
    ├── Persistence/Eloquent/Order/EloquentOrderRepository.php
    └── Providers/OrderServiceProvider.php
```

`CreateOrderUseCase` depends only on `OrderRepositoryInterface`. `OrderServiceProvider` binds that contract to `EloquentOrderRepository`, so the persistence layer can be replaced without touching the use case. Because of that, the use case tests run without a database.

## Running locally

Install the dependencies with Docker, so PHP and Composer are not required on the host:

```bash
docker run --rm \
  -u "$(id -u):$(id -g)" \
  -v "$(pwd):/app" \
  -w /app \
  composer:latest \
  composer install --ignore-platform-reqs
```

Then start the application:

```bash
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan test
```

## Next steps

- [ ] Register the order creation route
- [ ] Take the customer from the authenticated user
- [ ] Connect order items to the order and persist them
