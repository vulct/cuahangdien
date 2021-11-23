<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property string|null $meta_title
 * @property string $slug
 * @property string $description
 * @property string|null $image
 * @property int $active
 * @property int $isDelete
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @property-read Collection|Tariff[] $tariff
 * @property-read int|null $tariff_count
 * @method static Builder|Brand newModelQuery()
 * @method static Builder|Brand newQuery()
 * @method static Builder|Brand query()
 * @method static Builder|Brand whereActive($value)
 * @method static Builder|Brand whereCreatedAt($value)
 * @method static Builder|Brand whereDescription($value)
 * @method static Builder|Brand whereId($value)
 * @method static Builder|Brand whereImage($value)
 * @method static Builder|Brand whereIsDelete($value)
 * @method static Builder|Brand whereMetaTitle($value)
 * @method static Builder|Brand whereName($value)
 * @method static Builder|Brand whereSlug($value)
 * @method static Builder|Brand whereUpdatedAt($value)
 * @mixin Builder
 */

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "meta_title",
        "slug",
        "description",
        "image",
        "active",
        "isDelete",
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tariff(): HasMany
    {
        return $this->hasMany(Tariff::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


}
