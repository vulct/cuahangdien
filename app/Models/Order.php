<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Order
 *
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @mixin Builder
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'code',
        'email',
        'name',
        'phone',
        'city',
        'province',
        'address',
        'description',
        'total',
        'shipping_status',
        'payment_status',
        'status',
        'shipping_method_id'
    ];

    public function shipping(): HasOne
    {
        return $this->hasOne(ShippingMethod::class, 'id', 'shipping_method_id');
    }

    public function getRouteKeyName(): string
    {
        return 'code_name';
    }
}
