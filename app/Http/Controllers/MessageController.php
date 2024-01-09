<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Image;
use App\Models\Messages;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function newmes(Request $request, $id)
    {
        $message = Messages::find($id);
        $prod = Products::find($message->product_id);

        $data = new Chat(); // Model adınızı kontrol edin (Messages -> Message)
        $data->from_user_id = Auth::user()->id;
        $data->to_user_id = $prod->user_id;
        $data->content = $request->input('contents'); // Doğru input adını kullanın
        $data->message_id = $message->id;
        $data->save();

        return redirect()->back()->with('success', 'Mesaj gönderildi.');
    }

    public function msg($id){
        $messages = Messages::find($id);
        $images = Image::all();
        $product = Products::find($messages->product_id);
        $chats = Chat::where('message_id',$id)
        ->get();
        if (Auth::id() == $messages->from_user_id){
            $user_id = $messages->to_user_id;
        }else{
            $user_id = $messages->from_user_id;
        }
        $user = User::find($user_id);
        return view('front.chat',[
            'user'=>$user,
            'images'=>$images,
            'product'=>$product,
            'chats'=>$chats,
            'id'=>$id
        ]);
    }
}
