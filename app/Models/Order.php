<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperOrder
 */
#[Fillable(['customer_id', 'status'])]
class Order extends Model
{
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
