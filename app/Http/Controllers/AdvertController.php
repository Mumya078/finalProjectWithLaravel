<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category as Category;
use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function adim1(){
        $categorydata= Category::all();
        return view("front.ilan-ver.adim1",[
            'categorydata' => $categorydata
        ]);
    }

    public function adim2($id){
        $allcat=Category::all();
        $selectedcat1=Category::find($id);
        return view("front.ilan-ver.adim-2.adim2",[
            'selectedcat1' => $selectedcat1,
            'allcat'=>$allcat
        ]);
    }
    public function adim2_1($id,$pid){
        $allcat=Category::all();
        $selectedcat1=Category::find($id);
        $selectedcat2=Category::find($pid);
        return view("front.ilan-ver.adim-2.adim2-1",[
            'selectedcat1' => $selectedcat1,
            'allcat'=>$allcat,
            'selectedcat2' => $selectedcat2,
        ]);
    }
    public function adim2_2($id,$pid,$sid){
        $allcat=Category::all();
        $selectedcat1=Category::find($id);
        $selectedcat2=Category::find($pid);
        $selectedcat3=Category::find($sid);
        return view("front.ilan-ver.adim-2.adim2-2",[
            'selectedcat1' => $selectedcat1,
            'allcat'=>$allcat,
            'selectedcat2' => $selectedcat2,
            'selectedcat3'=>$selectedcat3
        ]);
    }
    public function adim2_3($id,$pid,$sid,$fid){
        $allcat=Category::all();
        $selectedcat1=Category::find($id);
        $selectedcat2=Category::find($pid);
        $selectedcat3=Category::find($sid);
        $selectedcat4=Category::find($fid);
        session(['cat'=>$selectedcat1,'type'=>$selectedcat2,'year'=>$selectedcat3,'model'=>$selectedcat4]);
        return view("front.ilan-ver.adim-2.adim2-3",[
            'selectedcat1' => $selectedcat1,
            'allcat'=>$allcat,
            'selectedcat2' => $selectedcat2,
            'selectedcat3'=>$selectedcat3,
            'selectedcat4'=>$selectedcat4
        ]);
    }
    public function adim3(){
        $cat = session('cat');
        $type= session('type');
        $year=session('year');
        $model=session('model');

        return view("front.ilan-ver.adim3",[
            'cat' => $cat,
            'type'=>$type,
            'year'=>$year,
            'model'=>$model
        ]);
    }

    public function adim3store(Request $request){
        $data = new Products();
        // Session'dan kategori, tip, model ve yıl bilgilerini al
        $category = session('cat');
        $type = session('type');
        $model = session('model');
        $year = session('year');
        $data->category = $category->title;
        $data->type = $type->title;
        $data->model = $model->title;
        $data->year = $year->title;
        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->KM=$request->KM;
        $data->HP = $request->HP;
        $data->color = $request->color;
        $data->price = $request->price;
        $data->trade = $request->trade;
        $data->save();
        if ($request->file('image')){
            foreach ($request->file('image') as $image){
                $newimage = new Image();
                $newimage->product_id = $data->id;
                $newimage->image = $image->store('images');
                $newimage->save();
            }
        }
        return redirect('/home');

    }


}
