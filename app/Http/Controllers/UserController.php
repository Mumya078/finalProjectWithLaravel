<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('front.profile',[
            'user'=>$user
        ]);
    }

    public function profile_store(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        $user->adress = $request->adress;
        $user->save();

        return redirect('/profile');
    }

    public function myads(){
        $images = Image::all();
        $productdata = Products::all();
        return view('front.myads',[
            'images'=>$images,
            'productdata'=>$productdata
        ]);
    }
    public function favorites(){
        $images = Image::all();

        // Mevcut oturum açmış kullanıcının favori ürünlerini al
        $favorites = Favorites::where('user_id', auth()->user()->id)->get();

        // Favori ürünlerine ait detayları al
        $productdata = $favorites->map(function ($favorite) {
            return $favorite->product;
        });

        return view('front.favorites', [
            'images' => $images,
            'productdata' => $productdata,
            'favorites' => $favorites
        ]);
    }

    public function messages(){
       return view('front.messages');
    }

}
