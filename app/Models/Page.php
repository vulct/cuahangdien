<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $keyword
 * @property string|null $description
 * @property string $content
 * @property int $type
 * @property int $active
 * @property int $isDelete
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Page newModelQuery()
 * @method static Builder|Page newQuery()
 * @method static Builder|Page query()
 * @method static Builder|Page whereActive($value)
 * @method static Builder|Page whereContent($value)
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereDescription($value)
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereIsDelete($value)
 * @method static Builder|Page whereKeyword($value)
 * @method static Builder|Page whereName($value)
 * @method static Builder|Page whereSlug($value)
 * @method static Builder|Page whereType($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @mixin Builder
 */
class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'keyword',
        'description',
        'content',
        'type',
        'active',
        'isDelete'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
