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
        session()->forget(['cat','type','year','model']);
        return view("front.ilan-ver.adim1",[
            'categorydata' => $categorydata
        ]);
    }

    public function adim2($id){
        $allcat=Category::all();
        $selectedcat1=Category::find($id);
        session(['cat'=>$selectedcat1]);
        return view("front.ilan-ver.adim-2.adim2",[
            'selectedcat1' => $selectedcat1,
            'allcat'=>$allcat
        ]);
    }
    public function adim2_1($id,$pid){
        $allcat=Category::all();
        $selectedcat1=Category::find($id);
        $selectedcat2=Category::find($pid);
        session(['type'=>$selectedcat2]);
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
        session(['year'=>$selectedcat3]);
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
        session(['model'=>$selectedcat4]);
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
            'model'=>$model,
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
        $data->category_id = $category->id;
        $data->type = $type ? $type->title:'Bilinmiyor';
        $data->model = $model ? $model->title : 'Bilinmiyor';
        $data->year =$year ? $year->title: 'Bilinmiyor';
        $data->form_element1= $request->form_element1;
        $data->form_element2= $request->form_element2;
        $data->form_element3= $request->form_element3;
        $data->form_element4= $request->form_element4;
        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->price = $request->price;
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
