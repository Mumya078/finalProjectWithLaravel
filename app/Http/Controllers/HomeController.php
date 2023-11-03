<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("front.index");
    }
    public function productdetail(){
        return view("front.productdetail");
    }

    public function adim1(){
        return view("front.ilan-ver.adim1");
    }

    public function adim2(){
        return view("front.ilan-ver.adim2");
    }
    public function adim3(){
        return view("front.ilan-ver.adim3");
    }

    public function category(){
        return view("front.category");
    }
}
