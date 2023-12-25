<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorites;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Products as Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productdetail($id){
        $data = Product::with('category')->find($id);
        $images = Image::all();
        $allcat = Category::all();

        $isAlreadyFavorited = false; // Varsayılan olarak false olarak ayarla

        // Kullanıcı giriş yapmışsa favori kontrolünü yap
        if (Auth::check()) {
            $isAlreadyFavorited = Favorites::where('user_id', Auth::user()->id)
                ->where('product_id', $data->id)
                ->exists();
        }

        $prod = [
            'category' => $data->category,  // Dize olarak alınacaksa
            'form_element1' => $data->form_element1,  // Dize olarak alınacaksa
        ];

        return view("front.productdetail",[
            'data'=>$data,
            'images'=>$images,
            'prod'=>$prod,
            'allcat'=>$allcat,
            'isAlreadyFavorited'=>$isAlreadyFavorited
        ]);
    }


    public function toggleFavorite($id)
    {
        $data = Product::with('category')->find($id);

        // Kullanıcının bu ürünü favorilere eklenmiş mi kontrol et
        $isAlreadyFavorited = Favorites::where('user_id', Auth::user()->id)
            ->where('product_id', $data->id)
            ->exists();

        if ($isAlreadyFavorited) {
            // Kullanıcının favorilerinden çıkarma
            Favorites::where('user_id', Auth::user()->id)
                ->where('product_id', $data->id)
                ->delete();
        } else {
            // Kullanıcının favorilerine ekleme
            $favorites = new Favorites();
            $favorites->user_id = Auth::user()->id;
            $favorites->product_id = $data->id;
            $favorites->save();
        }

        return redirect("/productdetail/{$data->id}");
    }

}
