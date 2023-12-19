<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category as Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Products;

class CategoryController extends Controller
{
    public static function maincategorylist(){
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    public function index($title) {
        $images = Image::all();
        // Kategori adına göre kategoriyi bul
        $categorydata = Category::where('title', $title)->get();

        // Kategori bulunursa, bu kategorinin ürünlerini çek
        $productdata = $categorydata->isNotEmpty()
            ? Products::where('category', $title)
                ->orWhere('type', $title)
                ->get()
            : collect(); // Eğer kategori bulunamazsa, boş bir koleksiyon kullan

        return view("front.category", [
            'categorydata' => $categorydata,
            'productdata' => $productdata,
            'images' => $images
        ]);
    }

}
