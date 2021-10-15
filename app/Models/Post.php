<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
