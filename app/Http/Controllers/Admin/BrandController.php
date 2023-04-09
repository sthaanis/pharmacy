<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;



class BrandController extends Controller
{
  public function index()
  {
    $brand = Brand::all();
    return view('admin.brand.list', ['brands' => $brand]);
  }
  public function new ()
  {
    return view('admin.brand.new');
  }

  public function save(Request $request)
  {
    $brand = new Brand();
    $brand->name = $request->get('name');
    $brand->slug = Str::slug($request->slug, '-');
    $brand->status = $request->get('status');
    if ($request->hasFile('brand_image')) {
      $image = $request->file('brand_image');
      $fileOriginalName = $image->getClientOriginalName();
      $path = public_path('brand/');
      $fileName = date('Ymd') . '-' . Str::random(5) . '-' . $fileOriginalName;

      $image->move($path, $fileName);
      $brand->brand_image = $fileName;
    }
    $brand->save();
    return redirect()->back();
  }

  public function details($id)
  {
    $brand = Brand::findOrFail($id);
    return view('admin.brand.detail', ['brand' => $brand]);
  }

  public function edit($id)
  {
    $brand = Brand::findOrFail($id);
    return view('admin.brand.edit', ['brand' => $brand]);
  }

  public function update(Request $request, $id)
  {
    $brand = Brand::findOrFail($id);
    $brand->name = $request->get('name');
    $brand->slug = Str::slug($request->slug, '-');
    $brand->status = $request->get('status');
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $fileName = date('Ymd') . '-' . Str::random(5) . '-' . $image->getClientOriginalExtension();
      $path = public_path('image');
      $image->move($path, $fileName);
      $brand->image = $image;
    }
    $brand->save();
    return redirect()->back();
  }

  public function remove($id)
  {
    $brand = Brand::findOrFail($id);
    $brand->delete();
    return redirect()->back();
  }
  public function trash()
  {
    $brand = Brand::onlyTrashed()->get();
    return view('admin.brand.trash', ['brands' => $brand]);
  }
  public function restore($id)
  {
    $brand = Brand::withTrashed()->findOrFail($id);
    $brand->restore();
    return redirect()->back();
  }
}