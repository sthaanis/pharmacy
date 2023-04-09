<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(){
        $company = Company::all();
        return view('admin.company.list',['companies'=>$company]);
    }
        

    public function new(){
        return view('admin.company.new');
    }

       /**
      * Save Function
      */

    public function save(Request $request){
        $company = new Company();
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->contact_no = $request->get('contact_no');
        $company->registration_no = $request->get('registration_no');
        $company->status = $request->get('status');
        $company->save();
        return redirect()->back();
    }

       /**
      * View details
      */
    public function details($id){
        $company = Company::findOrFail($id);
        return view('admin.company.detail',['company'=>$company]);
    }

       /**
      * View edit
      */

    public function edit($id){
        $company = Company::findOrFail($id);
        return view('admin.company.edit',['company'=>$company]);
    }

    public function update(Request $request, $id){
        $company = Company::findOrFail($id);
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->contact_no = $request->get('contact_no');
        $company->registration_no = $request->get('registration_no');
        $company->status = $request->get('status');
        $company->save();
        return redirect()->back();
    }

    public function remove($id){
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->back();
    }
    public function trash(){
        $company = Company::onlyTrashed()->get();
        return view('admin.company.trash',['companies'=>$company]);
    }
    public function restore($id){
        $company = Company::withTrashed()->findOrFail($id);
        $company->restore();
        return redirect()->back();
    }


}


