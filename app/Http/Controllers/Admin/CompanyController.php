<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(){
        $company = Company::all();
        return view('admin.company.index',['companies'=>$company]);
    }

    public function new(){
        return view('admin.company.new');
    }

    public function store(Request $request){
        $company = new Company();
        $company->company_name = $request->get('company_name');
        $company->address = $request->get('address');
        $company->email = $request->get('email');
        $company->contact_no = $request->get('contact_no');
        $company->registration_no = $request->get('registration_no');
        $company->save();
        return redirect()->route('pharmacy.admin.company.index')->with("message","New Company Created");
    }

    public function edit($id){
        $company = Company::find($id);
        return view('admin.company.edit',['company'=>$company]);
    }

    public function update(Request $request, $id){
        $company = Company::find($id);
        $company->company_name = $request->get('company_name');
        $company->address = $request->get('address');
        $company->email = $request->get('email');
        $company->contact_no = $request->get('contact_no');
        $company->registration_no = $request->get('registration_no');
        if($company->isDirty()){
            $company->save();
            return redirect()->route('pharmacy.admin.company.index')->with("message","Company Details Updated");
        }else{
            return redirect()->route('pharmacy.admin.company.index')->with("message","No changes Made");
        }
        
    }

    public function remove($id){
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('pharmacy.admin.company.index')->with("message","Company Removed");
    }

    public function trash(){
        $company = Company::onlyTrashed()->get();
        return view('admin.company.trash',['companies'=>$company]);
    }

    public function restore($id){
        $company = Company::withTrashed()->find($id);
        $company->restore();
        return redirect()->route('pharmacy.admin.company.trash')->with("message","Company Restored");
    }

    public function delete($id){
        $company = Company::withTrashed()->find($id);
        $company->forceDelete();
        return redirect()->route('pharmacy.admin.company.trash')->with("message","Company Deleted Permanently");
    }
}
