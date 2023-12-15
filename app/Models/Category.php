<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Category extends Model
{
    protected $fillable = [
        'category', 'type', 'model', 'year', 'title', 'desc', 'form_element1', 'form_element2', 'form_element3', 'form_element4', 'price'
    ];

    use HasFactory;
    #onetomany
    #bir kategori birden fazla producta sahip olabilir
    public function products()
    {
        return $this->hasMany(Products::class);
    }

    #bir kategorinin sadece bir adet parenti olabilir
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    #bir kategori birden fazla children sahip olabilir
    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
