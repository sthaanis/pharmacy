<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Company;
use App\Models\Brand;
use App\Models\MedicineType;

class PurchaseController extends Controller
{
    public function index(){
        $purchase = Purchase::all();
        return view('admin.purchase.list',['purchases'=>$purchase]);
    }
    public function new(){
        $company = Company::where('status','active')->get();
        $brand = Brand::where('status','active')->get();
        $medicine_type = MedicineType::where('status','active')->get();
        return view('admin.purchase.new',['companies'=>$company,'brands'=>$brand,'medicine_types'=>$medicine_type]);

    }

    

    public function save(Request $request){
        $purchase = new Purchase();
        $purchase->item_name = $request->get('item_name');
        $purchase->quantity = $request->get('quantity');
        $purchase->rate = $request->get('rate');
        $purchase->amount = $request->get('amount');
        $purchase->company_id = $request->get('company_id');
        $purchase->brand_id = $request->get('brand_id');
        $purchase->medicine_type_id = $request->get('medicine_type_id');
        $purchase->save();
        return redirect()->back();
    }

    public function details($id){
        $purchase = Purchase::findOrFail($id);
        return view('admin.purchase.detail',['purchase'=>$purchase]);
    }

    public function edit($id){
        $purchase = Purchase::findOrFail($id);
        return view('admin.purchase.edit',['purchase'=>$purchase]);
    }

    public function update(Request $request, $id){
        $purchase = Purchase::findOrFail($id);
        $purchase->item_name = $request->get('item_name');
        $purchase->quantity = $request->get('quantity');
        $purchase->rate = $request->get('rate');
        $purchase->amount = $request->get('amount');
        $purchase->save();
        return redirect()->back();
    }

    public function remove($id){
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->back();
    }

    public function trash(){
        $purchase = Purchase::onlyTrashed()->get();
        return view('admin.purchase.trash',['purchases'=>$purchase]);
    }

    public function restore($id){
        $purchase = Purchase::withTrashed()->findOrFail($id);
        $purchase->restore();
        return redirect()->back();
    }
}


