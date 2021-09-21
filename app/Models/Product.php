<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "content",
        "description",
        "image",
        "slug",
        "warranty",
        "unit",
        "active",
        "isDelete",
        "category_id",
        "brand_id",
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttributes::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
