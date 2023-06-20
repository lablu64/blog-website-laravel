<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\MetaDescription;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.dashboard');
});

Route::get('/home',[HomeController::class,'index']);
Route::get('/logout',[HomeController::class,'logout'])->name('logout');

Route::get('/product-details/{slug}',[PostDetailController::class,'ProductDetails'])->name('productdetails');
Route::get('/category-details/{slug}',[PostDetailController::class,'categorytDetails'])->name('categorytDetails');




Route::group([ "middleware" => ['auth:sanctum', config('jetstream.auth_session'), 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
});

Route::group(['as'=>'admin.','prefix'=>'admin' ,'middleware'=>['admin','auth']],function(){
    
   
    Route::resource('category',CategoryController::class);


    Route::POST('getSubcategory',[CategoryController::class,'getSubcategory'])->name('getSubcategory');
    Route::resource('post',ProductController::class);
    Route::resource('metadescription',MetaDescription::class);


    Route::get('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('update-password');
   
 


});

// Route::get('/product-details/{id}',[FrontController::class,'ProductDetails'])->name('productdetails');
// Route::get('/cart',[FrontController::class,'cart'])->name('cart');



