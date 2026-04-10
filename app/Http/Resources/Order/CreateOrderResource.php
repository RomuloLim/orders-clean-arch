<?php

declare(strict_types=1);

namespace App\Http\Resources\Order;

use App\Application\Order\DTOs\CreateOrderOutput;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin CreateOrderOutput
 */
class CreateOrderResource extends JsonResource
{
    /**
     * @return array{id:int}
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
