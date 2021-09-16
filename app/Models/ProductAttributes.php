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
        "price_list",
        "discount",
        "price_sale",
        "active",
        "isDelete",
    ];
}
