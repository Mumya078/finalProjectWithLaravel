<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorites;
use App\Models\Image;
use App\Models\Messages;
use App\Models\User;
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

    public function sendmessage($id) {
        $auth_id = Auth::user()->id;
        // Kullanıcının gönderdiği veya aldığı tüm mesajları çek
        $messages = Messages::where('from_user_id', $auth_id)
            ->orWhere('to_user_id', $auth_id)
            ->orderBy('created_at', 'asc')
            ->get();

        $images = Image::all();
        // Belirli bir ürünü bul
        $product = Product::find($id);

        // Eğer ürün bulunamazsa, isteğe bağlı olarak bir hata mesajı döndürebilirsiniz
        if (!$product) {
            return abort(404); // veya başka bir hata sayfasına yönlendirme yapabilirsiniz
        }

        // Ürünün sahibinin kullanıcı ID'sini al
        $user_id = $product->user_id;

        // Kullanıcıyı bul
        $user = User::find($user_id);

        // Eğer kullanıcı bulunamazsa, isteğe bağlı olarak bir hata mesajı döndürebilirsiniz
        if (!$user) {
            return abort(404); // veya başka bir hata sayfasına yönlendirme yapabilirsiniz
        }

        return view('front.chat', [
            'user' => $user,
            'product' => $product,
            'images'=>$images,
            'messages'=>$messages
        ]);
    }


}
