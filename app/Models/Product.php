<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "meta_title",
        "content",
        "description",
        "image",
        "slug",
        "warranty",
        "unit",
        "keyword",
        "active",
        "isDelete",
        "view",
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

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
