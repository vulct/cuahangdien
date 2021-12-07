<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\OrderItem
 *
 * @property int $id
 * @property int $quantity
 * @property string|null $price
 * @property string|null $discount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $product_attribute_id
 * @property int $order_id
 * @method static Builder|OrderItem newModelQuery()
 * @method static Builder|OrderItem newQuery()
 * @method static Builder|OrderItem query()
 * @method static Builder|OrderItem whereCreatedAt($value)
 * @method static Builder|OrderItem whereDiscount($value)
 * @method static Builder|OrderItem whereId($value)
 * @method static Builder|OrderItem whereOrderId($value)
 * @method static Builder|OrderItem wherePrice($value)
 * @method static Builder|OrderItem whereProductAttributeId($value)
 * @method static Builder|OrderItem whereQuantity($value)
 * @method static Builder|OrderItem whereUpdatedAt($value)
 * @mixin Builder
 */

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
        'discount',
        'product_attribute_id',
        'order_id'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
