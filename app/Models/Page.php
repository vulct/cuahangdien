<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'keyword',
        'description',
        'content',
        'type',
        'active',
        'isDelete'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
