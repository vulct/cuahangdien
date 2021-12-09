<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property string $code_name
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @mixin Builder
 * @property int $id
 * @property string $code
 * @property string $email
 * @property string $name
 * @property string $phone
 * @property string $city
 * @property string $province
 * @property string $address
 * @property string $description
 * @property string $total
 * @property int $payment_status
 * @property int $shipping_status
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $shipping_method_id
 * @property-read Collection|OrderItem[] $items
 * @property-read int|null $items_count
 * @property-read ShippingMethod|null $shipping
 * @method static Builder|Order whereAddress($value)
 * @method static Builder|Order whereCity($value)
 * @method static Builder|Order whereCode($value)
 * @method static Builder|Order whereCodeName($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereDescription($value)
 * @method static Builder|Order whereEmail($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereName($value)
 * @method static Builder|Order wherePaymentStatus($value)
 * @method static Builder|Order wherePhone($value)
 * @method static Builder|Order whereProvince($value)
 * @method static Builder|Order whereShippingMethodId($value)
 * @method static Builder|Order whereShippingStatus($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereTotal($value)
 * @method static Builder|Order whereUpdatedAt($value)
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'code_name',
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

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'code_name';
    }
}
