<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
}
