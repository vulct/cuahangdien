<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $rating
 * @property string|null $content
 * @property int $type
 * @property int $active
 * @property int $isDelete
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $product_id
 * @property int|null $post_id
 * @property-read Post|null $post
 * @property-read Product|null $product
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static Builder|Comment query()
 * @method static Builder|Comment whereActive($value)
 * @method static Builder|Comment whereContent($value)
 * @method static Builder|Comment whereCreatedAt($value)
 * @method static Builder|Comment whereEmail($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment whereIsDelete($value)
 * @method static Builder|Comment whereName($value)
 * @method static Builder|Comment wherePhone($value)
 * @method static Builder|Comment wherePostId($value)
 * @method static Builder|Comment whereProductId($value)
 * @method static Builder|Comment whereRating($value)
 * @method static Builder|Comment whereType($value)
 * @method static Builder|Comment whereUpdatedAt($value)
 * @mixin Builder
 */
class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'content',
        'rating',
        'type',
        'active',
        'post_id',
        'product_id'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
