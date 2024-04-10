<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'rating',
        'type',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
