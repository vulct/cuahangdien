<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Tariff
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $link_download link pdf drive
 * @property string|null $image
 * @property string|null $language
 * @property int $active
 * @property int $isDelete
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $brand_id
 * @property-read Brand|null $brand
 * @method static Builder|Tariff newModelQuery()
 * @method static Builder|Tariff newQuery()
 * @method static Builder|Tariff query()
 * @method static Builder|Tariff whereActive($value)
 * @method static Builder|Tariff whereBrandId($value)
 * @method static Builder|Tariff whereCreatedAt($value)
 * @method static Builder|Tariff whereId($value)
 * @method static Builder|Tariff whereImage($value)
 * @method static Builder|Tariff whereIsDelete($value)
 * @method static Builder|Tariff whereLanguage($value)
 * @method static Builder|Tariff whereLinkDownload($value)
 * @method static Builder|Tariff whereName($value)
 * @method static Builder|Tariff whereSlug($value)
 * @method static Builder|Tariff whereUpdatedAt($value)
 * @mixin Builder
 */
class Tariff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link_download',
        'language',
        'image',
        'slug',
        'active',
        'isDelete',
        'brand_id'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
