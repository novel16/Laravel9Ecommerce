<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }


    public function create(){
        return view('admin.category.create');
    }

    
    public function store(CategoryFormRequest $request){

        
        $validated = $request->validated();

        $category = new Category;
        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['slug']);
        $category->description = $validated['description'];

        
        if($request->hasFile('image')){
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            
            $category->image = $filename;
            $file->move('uploads/category/',$filename);
        }

        $category->meta_title = $validated['meta_title'];
        $category->meta_keyword = $validated['meta_keyword'];
        $category->meta_description = $validated['meta_description'];

        $category->status = $request->status == true ? '1': '0';
        $category->save();

        return redirect('admin/category')->with('message', 'Category successfully added!');

    }
    







}
