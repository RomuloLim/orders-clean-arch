# Orders Clean Arch

A study project that models an order domain in Laravel following Clean Architecture. The goal is to keep business rules independent from the framework and the database.

> **Status: work in progress.** The domain, one use case and the Eloquent persistence are in place. There are no HTTP endpoints yet, and order items are modeled but not persisted.

## Stack

- PHP 8.3+ and Laravel 13
- PostgreSQL 18, via Laravel Sail (Docker)
- PHPUnit

## Architecture

Dependencies point inward: `Infrastructure` knows `Domain`, and `Domain` knows nothing about Laravel.

```
app/
├── Domain/            Entities, enums and contracts (plain PHP)
│   ├── Entities/      Order, OrderItem
│   ├── Enums/         OrderStatus
│   └── Contracts/     OrderRepositoryInterface
├── Application/       Use cases that orchestrate the domain
│   └── Order/UseCases/CreateOrderUseCase.php
└── Infrastructure/    Framework and database details
    ├── Persistence/Eloquent/Order/EloquentOrderRepository.php
    └── Providers/OrderServiceProvider.php
```

`CreateOrderUseCase` depends only on `OrderRepositoryInterface`. `OrderServiceProvider` binds that contract to `EloquentOrderRepository`, so the persistence layer can be replaced without touching the use case.

## Running locally

```bash
composer install
cp .env.example .env
php artisan key:generate
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan test
```

## Next steps

- [ ] Expose order creation through an HTTP endpoint
- [ ] Persist order items
- [ ] Add unit tests for the use case and the domain
