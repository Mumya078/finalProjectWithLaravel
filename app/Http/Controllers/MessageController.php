<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function newmes(Request $request, $id)
    {
        $prod = Products::find($id); // Model adınızı kontrol edin (Products -> Product)


        $data = new Messages(); // Model adınızı kontrol edin (Messages -> Message)
        $data->from_user_id = auth()->user()->id;
        $data->to_user_id = $prod->user_id;
        $data->product_id = $id;
        $data->content = $request->input('contents'); // Doğru input adını kullanın
        $data->save();

        return redirect()->back()->with('success', 'Mesaj gönderildi.');
    }
}
