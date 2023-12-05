<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category as Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public static function maincategorylist(){
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    public function index(){
        $categorydata= Category::all();
        return view("front.index",[
            'categorydata'=> $categorydata
        ]);
    }

    public function category(){
        return view("front.category");
    }
}
