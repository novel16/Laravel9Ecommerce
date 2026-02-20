<?php

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
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

Route::get('/new-arrivals', [FrontendController::class, 'newArrival']);
Route::get('/featured-products', [FrontendController::class, 'featuredProducts']);
Route::get('/search', [FrontendController::class, 'searchProducts']);


Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);

Route::middleware(['auth'])->group(function(){
    Route::get('/wishlist', [WishlistController::class,'index']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::get('/orders',[OrderController::class, 'index']);
    Route::get('orders/{orderId}',[OrderController::class, 'show']);
    Route::get('/profile',[FrontendUserController::class, 'index']);
    Route::post('/profile',[FrontendUserController::class, 'updateUserProfile']);
    Route::get('/change-password',[FrontendUserController::class, 'updatePassword']);
    Route::post('/change-password',[FrontendUserController::class, 'changePassword']);
});

Route::get('/thank-you', [FrontendController::class, 'thankyou']);

Route::get('/home', function () {
    return redirect('/');
})->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'store']);
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

    Route::controller(AdminOrderController::class)->group(function(){
        Route::get('/orders','index');
        Route::get('/orders/{orderId}','show');
        Route::put('/orders/{orderId}','updateOrderStatus');

        Route::get('/invoice/{orderId}','viewInvoice');
        Route::get('/invoice/{orderId}/generate','generateInvoice');
        Route::get('/invoice/{orderId}/mail','mailInvoice');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('/users','index');
        Route::get('/users/create','create');
        Route::post('/users','store');
        Route::get('/users/{user}/edit','edit');
        Route::put('/users/{user}','update');
        Route::delete('/users/{user}/delete','destroy');

    });

});