<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meta_title',
        'slug',
        'parent_id',
        'keyword',
        'description',
        'image',
        'active',
        'top',
        'isDelete'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
