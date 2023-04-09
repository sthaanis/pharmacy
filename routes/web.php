<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;

use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MedicineTypeController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\SliderController;

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
Route::get('/', [FrontendController::class, 'index'])->name('pharmacy.front.index');
Route::get('/product-details/{id}', [FrontendController::class, 'productDetail'])->name('pharmacy.front.product.detail');
Route::post('/register', [FrontendController::class, 'register'])->name('pharmacy.front.user.register');
Route::post('/authenticate', [FrontendController::class, 'authenticate'])->name('pharmacy.user.authenticate');
Route::get('/logout', [FrontendController::class, 'logout'])->name('pharmacy.front.logout');
Route::post('/cart', [FrontendController::class, 'addToCart'])->name('pharmacy.front.product.detail.cart');
Route::get('/my-account', [FrontendController::class, 'myAccount'])->name('pharmacy.front.user.myaccount');
Route::get('/view-cart', [FrontendController::class, 'viewCart'])->name('pharmacy.front.user.viewcart');
Route::post('/place-order', [FrontendController::class, 'placeOrder'])->name('pharmacy.front.user.placeorder');
Route::post('/cart/remove', [FrontendController::class, 'removeItem'])->name('pharmacy.front.user.removecartitem');

Route::get('/shop',[FrontendController::class, 'shop'])->name('pharmacy.front.shop');
Route::get('/medicine',[FrontendController::class, 'medicine'])->name('pharmacy.front.shop.medicine');
Route::get('/shop-by-category',[FrontendController::class, 'shopByCategory'])->name('pharmacy.front.shop.category');
Route::get('/shop-by-brand',[FrontendController::class, 'shopByBrand'])->name('pharmacy.front.shop.brand');
Route::get('/new-arrival',[FrontendController::class, 'newArrival'])->name('pharmacy.front.shop.newarrival');


Route::group(['prefix' => 'admin'], function () {
  Route::get('/dashboard', [DashController::class, 'index'])->name('pharmacy.admin.dashboard');
  Route::get('/', [BackendController::class, 'login'])->name('pharmacy.admin.login');
  Route::post('/authenticate', [BackendController::class, 'authenticate'])->name('pharmacy.admin.authenticate');
  Route::get('/logout', [BackendController::class, 'logout'])->name('pharmacy.admin.logout');

  /**
   * Route For Company
   */
  Route::group(['prefix' => 'company'], function () {
    Route::get('/', [CompanyController::class, 'index'])->name('pharmacy.admin.company.index');
    Route::get('/new', [CompanyController::class, 'new'])->name('pharmacy.admin.company.new');
    Route::post('/save', [CompanyController::class, 'save'])->name('pharmacy.admin.company.save');
    Route::get('/{id}/details', [CompanyController::class, 'details'])->name('pharmacy.admin.company.details');
    Route::get('/{id}/edit', [CompanyController::class, 'edit'])->name('pharmacy.admin.company.edit');
    Route::post('/update/{id}', [CompanyController::class, 'update'])->name('pharmacy.admin.company.update');
    Route::get('{id}/remove', [CompanyController::class, 'remove'])->name('pharmacy.admin.company.remove');
    Route::get('/trash', [CompanyController::class, 'trash'])->name('pharmacy.admin.company.trash');
    Route::get('{id}/restore', [CompanyController::class, 'restore'])->name('pharmacy.admin.company.restore');
  });
  /**
   * Route For Brand
   */

  Route::group(['prefix' => 'brand'], function () {
    Route::get('/', [BrandController::class, 'index'])->name('pharmacy.admin.brand.index');
    Route::get('/new', [BrandController::class, 'new'])->name('pharmacy.admin.brand.new');
    Route::post('/save', [BrandController::class, 'save'])->name('pharmacy.admin.brand.save');
    Route::get('/{id}/details', [BrandController::class, 'details'])->name('pharmacy.admin.brand.details');
    Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('pharmacy.admin.brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('pharmacy.admin.brand.update');
    Route::get('{id}/remove', [BrandController::class, 'remove'])->name('pharmacy.admin.brand.remove');
    Route::get('/trash', [BrandController::class, 'trash'])->name('pharmacy.admin.brand.trash');
    Route::get('{id}/restore', [BrandController::class, 'restore'])->name('pharmacy.admin.brand.restore');
  });

  /**
   * Route For Category
   */
  Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('pharmacy.admin.category.index');
    Route::get('/new', [CategoryController::class, 'new'])->name('pharmacy.admin.category.new');
    Route::post('/save', [CategoryController::class, 'save'])->name('pharmacy.admin.category.save');
    Route::get('/{id}/details', [CategoryController::class, 'details'])->name('pharmacy.admin.category.details');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('pharmacy.admin.category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('pharmacy.admin.category.update');
    Route::get('{id}/remove', [CategoryController::class, 'remove'])->name('pharmacy.admin.category.remove');
    Route::get('/trash', [CategoryController::class, 'trash'])->name('pharmacy.admin.category.trash');
    Route::get('{id}/restore', [CategoryController::class, 'restore'])->name('pharmacy.admin.category.restore');
  });
  /**
   * Route For Purchase
   */
  Route::group(['prefix' => 'purchase'], function () {
    Route::get('/', [PurchaseController::class, 'index'])->name('pharmacy.admin.purchase.index');
    Route::get('/new', [PurchaseController::class, 'new'])->name('pharmacy.admin.purchase.new');
    Route::post('/save', [PurchaseController::class, 'save'])->name('pharmacy.admin.purchase.save');
    Route::get('/{id}/details', [PurchaseController::class, 'details'])->name('pharmacy.admin.purchase.details');
    Route::get('/{id}/edit', [PurchaseController::class, 'edit'])->name('pharmacy.admin.purchase.edit');
    Route::post('/update/{id}', [PurchaseController::class, 'update'])->name('pharmacy.admin.purchase.update');
    Route::get('{id}/remove', [PurchaseController::class, 'remove'])->name('pharmacy.admin.purchase.remove');
    Route::get('/trash', [PurchaseController::class, 'trash'])->name('pharmacy.admin.purchase.trash');
    Route::get('{id}/restore', [PurchaseController::class, 'restore'])->name('pharmacy.admin.purchase.restore');
  });
  /**
   * Route For Medicine Type
   */
  Route::group(['prefix' => 'medicine_type'], function () {
    Route::get('/', [MedicineTypeController::class, 'index'])->name('pharmacy.admin.medicine_type.index');
    Route::get('/new', [MedicineTypeController::class, 'new'])->name('pharmacy.admin.medicine_type.new');
    Route::post('/save', [MedicineTypeController::class, 'save'])->name('pharmacy.admin.medicine_type.save');
    Route::get('/{id}/details', [MedicineTypeController::class, 'details'])->name('pharmacy.admin.medicine_type.details');
    Route::get('/{id}/edit', [MedicineTypeController::class, 'edit'])->name('pharmacy.admin.medicine_type.edit');
    Route::post('/update/{id}', [MedicineTypeController::class, 'update'])->name('pharmacy.admin.medicine_type.update');
    Route::get('{id}/remove', [MedicineTypeController::class, 'remove'])->name('pharmacy.admin.medicine_type.remove');
    Route::get('/trash', [MedicineTypeController::class, 'trash'])->name('pharmacy.admin.medicine_type.trash');
    Route::get('{id}/restore', [MedicineTypeController::class, 'restore'])->name('pharmacy.admin.medicine_type.restore');

  });

  /**
   * Route For Purchase
   */
  Route::group(['prefix' => 'purchase'], function () {
    Route::get('/', [PurchaseController::class, 'index'])->name('pharmacy.admin.purchase.index');
    Route::get('/new', [PurchaseController::class, 'new'])->name('pharmacy.admin.purchase.new');
    Route::post('/save', [PurchaseController::class, 'save'])->name('pharmacy.admin.purchase.save');
    Route::get('/{id}/details', [PurchaseController::class, 'details'])->name('pharmacy.admin.purchase.details');
    Route::get('/{id}/edit', [PurchaseController::class, 'edit'])->name('pharmacy.admin.purchase.edit');
    Route::post('/update/{id}', [PurchaseController::class, 'update'])->name('pharmacy.admin.purchase.update');
    Route::get('{id}/remove', [PurchaseController::class, 'remove'])->name('pharmacy.admin.purchase.remove');
    Route::get('/trash', [PurchaseController::class, 'trash'])->name('pharmacy.admin.purchase.trash');
    Route::get('{id}/restore', [PurchaseController::class, 'restore'])->name('pharmacy.admin.purchase.restore');

  });

  /**
   * Route For Products
   */
  Route::group(['prefix' => 'product'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('pharmacy.admin.product.index');
    Route::get('/new', [ProductController::class, 'new'])->name('pharmacy.admin.product.new');
    Route::post('/save', [ProductController::class, 'save'])->name('pharmacy.admin.product.save');
    Route::get('/{id}/details', [ProductController::class, 'details'])->name('pharmacy.admin.product.details');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('pharmacy.admin.product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('pharmacy.admin.product.update');
    Route::get('{id}/remove', [ProductController::class, 'remove'])->name('pharmacy.admin.product.remove');
    Route::get('/trash', [ProductController::class, 'trash'])->name('pharmacy.admin.product.trash');
    Route::get('{id}/restore', [ProductController::class, 'restore'])->name('pharmacy.admin.product.restore');
 


  });

  Route::group(['prefix' => 'slider'], function () {
    Route::get('/', [SliderController::class, 'index'])->name('pharmacy.admin.slider.index');
    Route::get('/new', [SliderController::class, 'new'])->name('pharmacy.admin.slider.new');
    Route::post('/save', [SliderController::class, 'save'])->name('pharmacy.admin.slider.save');
    Route::get('/{id}/details', [SliderController::class, 'details'])->name('pharmacy.admin.slider.details');
    Route::get('/{id}/edit', [SliderController::class, 'edit'])->name('pharmacy.admin.slider.edit');
    Route::post('/update/{id}', [SliderController::class, 'update'])->name('pharmacy.admin.slider.update');
    Route::get('{id}/remove', [SliderController::class, 'remove'])->name('pharmacy.admin.slider.remove');
    Route::get('/trash', [SliderController::class, 'trash'])->name('pharmacy.admin.slider.trash');
    Route::get('{id}/restore', [SliderController::class, 'restore'])->name('pharmacy.admin.slider.restore');

  });

});