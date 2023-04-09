<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\MedicineType;


class MedicineTypeController extends Controller
{
    public function index(){
        $medicine_type = MedicineType::all();
        return view('admin.medicine_type.list',['medicine_types'=>$medicine_type]);
    }
    public function new(){
        return view('admin.medicine_type.new');
    }

    public function save(Request $request){
        $medicine_type = new MedicineType();
        $medicine_type->medicine_type = $request->get('medicine_type');
        $medicine_type->status = $request->get('status');
        $medicine_type->save();
        return redirect()->back();
    }

    public function details($id){
        $medicine_type = MedicineType::findOrFail($id);
        return view('admin.medicine_type.detail',['medicine_type'=>$medicine_type]);
    }
    public function edit($id){
        $medicine_type = MedicineType::findOrFail($id);
        return view('admin.medicine_type.edit',['medicine_type'=>$medicine_type]);
    }
    public function update(Request $request, $id){
        $medicine_type = MedicineType::findOrFail($id);
        $medicine_type->medicine_type = $request->get('medicine_type');
        $medicine_type->status = $request->get('status');
        $medicine_type->save();
        return redirect()->back();
    }
    public function remove($id){
        $medicine_type = MedicineType::findOrFail($id);
        $medicine_type->delete();
        return redirect()->back();
    }

    public function trash(){
        $medicine_type = MedicineType::onlyTrashed()->get();
        return view('admin.medicine_type.trash',['medicine_types'=>$medicine_type]);
    }

    public function restore($id){
        $medicine_type = MedicineType::withTrashed()->findOrFail($id);
        $medicine_type->restore();
        return redirect()->back();
    }


    
}
