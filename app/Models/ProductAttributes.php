<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProductAttributes
 *
 * @property int $id
 * @property string|null $type_name
 * @property string $codename
 * @property string|null $size
 * @property string|null $price
 * @property string|null $discount
 * @property int $isDelete
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $product_id
 * @property-read Product|null $product
 * @method static Builder|ProductAttributes newModelQuery()
 * @method static Builder|ProductAttributes newQuery()
 * @method static Builder|ProductAttributes query()
 * @method static Builder|ProductAttributes whereCodename($value)
 * @method static Builder|ProductAttributes whereCreatedAt($value)
 * @method static Builder|ProductAttributes whereDiscount($value)
 * @method static Builder|ProductAttributes whereId($value)
 * @method static Builder|ProductAttributes whereIsDelete($value)
 * @method static Builder|ProductAttributes wherePrice($value)
 * @method static Builder|ProductAttributes whereProductId($value)
 * @method static Builder|ProductAttributes whereSize($value)
 * @method static Builder|ProductAttributes whereTypeName($value)
 * @method static Builder|ProductAttributes whereUpdatedAt($value)
 * @mixin Builder
 */
class ProductAttributes extends Model
{
    use HasFactory;

    protected $fillable = [
        "type_name",
        "codename",
        "size",
        "price",
        "discount",
        "product_id",
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
