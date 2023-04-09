<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Company;
use App\Models\Brand;
use App\Models\MedicineType;





class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.product.list', ['products' => $product]);
    }

    public function new ()
    {
        $category = Category::where('status', 'active')->get();
        $company = Company::where('status', 'active')->get();
        $brand = Brand::where('status', 'active')->get();
        $medicineType = MedicineType::where('status', 'active')->get();
        return view('admin.product.new', ['categories' => $category, 'companies' => $company, 'brands' => $brand, 'medicineTypes' => $medicineType]);
    }

    public function save(Request $request)
    {
        $product = new Product();
        $product->product_key = Str::uuid();
        $product->product_code = mt_rand(10000000, 99999999);
        $product->product_name = $request->get('product_name');
        $product->category_id = $request->get('category_id');
        $product->company_id = $request->get('company_id');
        $product->brand_id = $request->get('brand_id');
        $product->medicine_type_id = $request->get('medicine_type_id');
        $product->quantity = $request->get('quantity');
        $product->mrp = $request->get('mrp');
        $product->short_desc = $request->get('short_desc');
        $product->long_desc = $request->get('long_desc');
        $product->availability = $request->get('availability');
        $product->status = $request->get('status');
        $product->is_featured = $request->get('is_featured');
        $product->is_topselling = $request->get('is_topselling');
        $product->special_price = $request->get('special_price');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('Ymd') . '-' . Str::random(5) . '-' . $image->getClientOriginalExtension();
            $path = public_path('product/');
            $image->move($path, $fileName);
            $product->image = $fileName;
        }
        $product->save();
        return redirect()->route('pharmacy.admin.product.index')->with("message", "new image created");
    }

    public function details($id)
    {
        $product = product::findOrFail($id);
        return view('admin.product.detail', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = product::findOrFail($id);
        return view('admin.product.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = product::findOrFail($id);
        $product->product_key = Str::uuid();
        $product->product_code = mt_rand(10000000, 99999999);
        $product->product_name = $request->get('product_name');
        $product->category_id = $request->get('category_id');
        $product->company_id = $request->get('company_id');
        $product->brand_id = $request->get('brand_id');
        $product->medicine_type_id = $request->get('medicine_type_id');
        $product->quantity = $request->get('quantity');
        $product->mrp = $request->get('mrp');
        $product->short_desc = $request->get('short_desc');
        $product->long_desc = $request->get('long_desc');
        $product->availability = $request->get('availability');
        $product->status = $request->get('status');
        $product->is_featured = $request->get('is_featured');
        $product->is_topselling = $request->get('is_topselling');
        $product->special_price = $request->get('special_price');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('Ymd') . '-' . Str::random(5) . '-' . $image->getClientOriginalExtension();
            $path = public_path('image');
            $image->move($path, $fileName);
            $product->image = $image;
            $product->save();
            return redirect()->back();
        }
    }

    public function remove($id)
    {

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('pharmacy.admin.product.index');
    }

    public function trash()
    {
        $product = product::onlyTrashed()->get();
        return view('admin.product.trash', ['products' => $product]);
    }

    public function restore($id)
    {
        $product = product::withTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->back();
    }

}