<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }


    public function create(){
        return view('admin.category.create');
    }

    
    public function store(Request $request){
        
        $validator = Validator::make($request->all(),[
            "name" => ['required', 'min:4'],
            "slug" => ['required', 'min:4'],
            "description" => ['required', 'min:4'],
            "image" => ['required', 'mimes:png,jpeg,jpg'],
            "meta_title" => ['required', 'min:4'],
            "meta_keyword" => ['required', 'min:4'],
            "meta_description" => ['required', 'min:4'],
            "status" => ['required'],

        ]);

        $category = new Category;
        $category->name = $request['name'];
        $category->slug = Str::slug($request['slug']);
        $category->description = $request['description'];

        
        if($request->hasFile('image')){
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            
            $category->image = $filename;
            $file->move('uploads/category/',$filename);
        }

        $category->meta_title = $request['meta_title'];
        $category->meta_keyword = $request['meta_keyword'];
        $category->meta_description = $request['meta_description'];

        $category->status = $request->status == true ? '1': '0';
        $category->save();

        return redirect('admin/category')->with('message', 'Category successfully added!');
        

    }

}
