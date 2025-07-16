<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);

Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);

Route::middleware(['auth'])->group(function(){
    Route::get('/wishlist', [WishlistController::class,'index']);
    Route::get('/cart', [CartController::class, 'index']);
});

Route::get('/home', function () {
    return redirect('/');
})->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);


    //home slider
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function(){
        Route::get('/slider','index');
        Route::get('/slider/create-slider','create');
        Route::post('/slider','store');
        Route::get('/slider/{slider}/edit', 'edit');
        Route::put('/slider/{slider}', 'update');
        Route::get('/slider/{slider}/delete', 'destroy');
    });

    //Category Routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('/category','index');
        Route::get('/category/create-category','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}', 'update');
        Route::delete('/category/delete/{category}', 'destroy');
    });

    //Product routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){

        Route::get('/products','index');
        Route::get('/products/create-product','create');
        Route::post('/products','store');
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product_id}/delete', 'destroy');

        Route::get('product-image/{product_image_id}/delete', 'destroyImage');

        Route::post('product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get("product-color/{prod_color_id}/delete", 'deleteProdColor');


    });


    //Brand routes
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);


     //Colors routes
     Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function(){

        Route::get('/colors','index');
        Route::get('/colors/create-color','create');
        Route::post('/colors','store');
        Route::get('/colors/{color}/edit','edit');
        Route::put('/colors/{color}','update');
        Route::delete('/colors/delete/{color_id}', 'destroy');
        

    });


});