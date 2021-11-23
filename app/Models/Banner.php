<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Banner
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $url
 * @property string|null $alt
 * @property string $image
 * @property int $sort
 * @property int $active
 * @property int $isDelete
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Banner newModelQuery()
 * @method static Builder|Banner newQuery()
 * @method static Builder|Banner query()
 * @method static Builder|Banner whereActive($value)
 * @method static Builder|Banner whereAlt($value)
 * @method static Builder|Banner whereCreatedAt($value)
 * @method static Builder|Banner whereId($value)
 * @method static Builder|Banner whereImage($value)
 * @method static Builder|Banner whereIsDelete($value)
 * @method static Builder|Banner whereSort($value)
 * @method static Builder|Banner whereTitle($value)
 * @method static Builder|Banner whereUpdatedAt($value)
 * @method static Builder|Banner whereUrl($value)
 * @mixin Eloquent
 */

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "url",
        "alt",
        "image",
        "sort",
        "active",
        "isDelete",
    ];
}
