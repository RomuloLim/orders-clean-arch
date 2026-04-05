<?php

declare(strict_types=1);


namespace App\Domain\Enums;

enum OrderStatus: string
{
    case OPEN = 'open';
    case PENDING_PAYMENT = 'pending_payment';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
}
