<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    #onetomany
    #bir kategori birden fazla producta sahip olabilir
    public function products()
    {
        return $this->hasMany(Product::class);
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
