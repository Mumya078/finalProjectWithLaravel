<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        $allcat = Category::all();
        return view("admin.index",[
            'allcat' => $allcat
        ]);
    }

    public function category(){
        $allcat = Category::all();
        return view("admin.category.index",[
            'allcat' => $allcat
        ]);
    }

    public function adminstorecategory(Request $request){
        $data = new Category();
        $data->title = $request->title;
        $data->parent_id = $request->parent;
        $data->color = $request->color;
        $data->image = $request->icon;
        $data->form_element1 = $request->form_element1;
        $data->form_element2 = $request->form_element2;
        $data->form_element3 = $request->form_element3;
        $data->form_element4 = $request->form_element4;
        $data->save();


        return redirect('/admin/category');
    }

    public function categorydelete($id){
        $category = Category::find($id);
        $category->delete();

        return redirect('/admin');
    }

    public function settings(){
        return view('admin.settings');
    }
    public function users(){
        $users = User::all();
        return view('admin.users',[
            'users'=>$users,
        ]);
    }
}
