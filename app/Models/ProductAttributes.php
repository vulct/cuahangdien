<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    use HasFactory;

    protected $fillable = [
        "type_name",
        "codename",
        "size",
        "price",
        "discount",
        "product_id",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
