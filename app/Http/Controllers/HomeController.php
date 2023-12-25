<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Products as Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public static function maincategorylist(){
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    public function index(){
        $categorydata= Category::all();
        $productdata = Product::all();
        $images = Image::all();
        return view("front.index",[
            'categorydata'=> $categorydata,
            'productdata' => $productdata,
            'images' => $images,
        ]);
    }

    public function login(){
        return view("auth.login");
    }
    public function logout(){
        Auth::logout();
        $categorydata= Category::all();
        $productdata = Product::all();
        $images = Image::all();
        return view("front.index",[
            'categorydata'=> $categorydata,
            'productdata' => $productdata,
            'images' => $images,
        ]);
    }

    public function search(Request $request){
        $query = $request->input('query');
        $images = Image::all();

        // Product modelinde arama yap
        $results = Product::where('title', 'like', '%' . $query . '%')
            ->orWhere('desc', 'like', '%' . $query . '%')
            ->orWhere('category', 'like', '%' . $query . '%')
            ->orWhere('year', 'like', '%' . $query . '%')
            ->orWhere('type', 'like', '%' . $query . '%')
            ->get();

        return view('front.search', ['results' => $results, 'query' => $query,'images'=>$images]);
    }
}
