<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.list',['categories'=>$category]);
    }
    
    public function new(){
        return view('admin.category.new');
    }

    public function save(Request $request){
        $category = new Category();
        $category->category_name = $request->get('category_name');
        $category->slug = Str::slug($request->slug, '-');
        $category->description = $request->get('description');
        $category->status = $request->get('status');
        $category->save();
        return redirect()->back();
    }

    public function details($id){
        $category = Category::findOrFail($id);
        return view('admin.category.detail',['category'=>$category]);
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit',['category'=>$category]);
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->category_name = $request->get('category_name');
        $category->slug = Str::slug($request->slug, '-');
        $category->description = $request->get('description');
        $category->status = $request->get('status');
        $category->save();
        return redirect()->back();
    }

    public function remove($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }

    public function trash(){
        $category = Category::onlyTrashed()->get();
        return view('admin.category.trash',['categories'=>$category]);
    }

    public function restore($id){
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->back();
    }
}
