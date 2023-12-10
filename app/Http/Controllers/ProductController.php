<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Products as Product;

class ProductController extends Controller
{
    public function productdetail($id){
        $data = Product::find($id);
        $images = Image::all();
        return view("front.productdetail",[
            'data'=>$data,
            'images'=>$images,
        ]);
    }

}
