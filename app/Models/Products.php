<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    #many to one
    public function  category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorites::class, 'product_id');
    }

    public function messages()
    {
        return $this->hasMany(Messages::class, 'product_id');
    }
}
