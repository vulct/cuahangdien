<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "image",
        "slug",
        "active",
        "isDelete",
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
