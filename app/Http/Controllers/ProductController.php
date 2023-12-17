<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Products as Product;

class ProductController extends Controller
{
    public function productdetail($id){
        $data = Product::with('category')->find($id);
        $images = Image::all();
        $allcat = Category::all();
        $prod = [
            'category' => $data->category,  // Dize olarak alınacaksa
            'form_element1' => $data->form_element1,  // Dize olarak alınacaksa
        ];
        return view("front.productdetail",[
            'data'=>$data,
            'images'=>$images,
            'prod'=>$prod,
            'allcat'=>$allcat
        ]);
    }

}
