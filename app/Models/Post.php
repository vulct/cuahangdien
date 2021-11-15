<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meta_title',
        'description',
        'content',
        'image',
        'slug',
        'keyword',
        'active',
        'isDelete',
        'view',
        'category_id'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
