<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ShippingMethod
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $active
 * @property int $isDelete
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ShippingMethod newModelQuery()
 * @method static Builder|ShippingMethod newQuery()
 * @method static Builder|ShippingMethod query()
 * @method static Builder|ShippingMethod whereActive($value)
 * @method static Builder|ShippingMethod whereCreatedAt($value)
 * @method static Builder|ShippingMethod whereDescription($value)
 * @method static Builder|ShippingMethod whereId($value)
 * @method static Builder|ShippingMethod whereIsDelete($value)
 * @method static Builder|ShippingMethod whereName($value)
 * @method static Builder|ShippingMethod whereUpdatedAt($value)
 * @mixin Builder
 */
class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "active",
        "isDelete",
    ];
}
