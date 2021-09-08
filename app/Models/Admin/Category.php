<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'image',
        'description',
        'slug',
        'active',
        'showHome',
        'isDelete'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
