<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.index');
// });
Route::group(['prefix'=>'site-admin'],function(){
    Route::get('/',[AdminController::class, 'index'])->name('pharmacy.admin.index');

    Route::group(['prefix'=>'company'],function(){
        Route::get('/',[CompanyController::class, 'index'])->name('pharmacy.admin.company.index');
        Route::get('/new-company',[CompanyController::class, 'new'])->name('pharmacy.admin.company.new');
        Route::post('/save',[CompanyController::class, 'store'])->name('pharmacy.admin.company.store');
        Route::get('/edit/{id}',[CompanyController::class, 'edit'])->name('pharmacy.admin.company.edit');
        Route::post('/update/{id}',[CompanyController::class,'update'])->name('pharmacy.admin.company.update');
        Route::get('/remove/{id}',[CompanyController::class, 'remove'])->name('pharmacy.admin.company.remove');
        Route::get('/trash',[CompanyController::class,'trash'])->name('pharmacy.admin.company.trash');
        Route::get('/restore/{id}',[CompanyController::class, 'restore'])->name('pharmacy.admin.company.restore');
        Route::get('/delete/{id}',[CompanyController::class,'delete'])->name('pharmacy.admin.company.delete');
    });
});

