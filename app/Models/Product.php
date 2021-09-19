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
}
