<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'keyword',
        'description',
        'logo',
        'icon',
        'hotline1',
        'hotline2',
        'phone',
        'address',
        'email',
        'tax_code',
        'business_license',
        'map_address',
        'map_iframe',
        'facebook',
        'zalo',
        'sale',
    ];

}
