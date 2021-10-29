<?php

use Illuminate\Support\Facades\Route;


////Dashboard Controller
//    use \App\Http\Controllers\Dashboard\{
//        CategoryController,
//        CurrencyController,
//        TagController,
//        //ProductController,
//        BrandController,
//        NotificationController,
//    };

//Website Controller
use \App\Http\Controllers\Website\{
    HomeController,
    CartController,
    CheckoutController,
    WishlistController,
    ProductController as WebsiteProductController,
    CategoryController as WebsiteCategoryController,
    AccountController,
    OrderController,
//    Order,
};
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

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('main.blade.php');
*/

require __DIR__.'/auth.php';

Route::prefix('admin')
        ->as('admin.')
        ->group(function (){
        require __DIR__. '/auth.php';
    });

Route::middleware('auth:admin')->prefix('admin')->namespace('Dashboard')->group(function () {

    Route::view('home','dashboard.index')->name('dashboard.home');
    Route::redirect('/','home');
    Route::resource('categories','CategoryController');
    Route::resource('currencies','CurrencyController');
    Route::resource('brands','BrandController');
    Route::resource('tags','TagController');
    Route::resource('orders','OrderController');
    Route::resource('admins','AdminController');
    Route::resource('roles','RoleController');
    // products
    Route::get('products/trash','ProductController@trash')->name('products.trash');
    Route::put('products/trash/{id?}','ProductController@restore')->name('products.restore');
    Route::delete('products/trash/{id?}','ProductController@forceDelete')->name('products.force-delete');
    Route::resource('products','ProductController');

    Route::get('notifications','NotificationController@index')->name('notifications');
    Route::get('notifications/{id}','NotificationController@show')->name('notifications.show');


});

Route::get('/', [HomeController::class,'index'])->name('home');

Route::prefix('website')->as('website.')->group(function (){
    Route::get('/', [HomeController::class,'index']);

    Route::get('categories', [WebsiteCategoryController::class, 'index'])->name('category.index');
    Route::get('categories/{slug}', [WebsiteCategoryController::class, 'show'])->name('category.show');

    Route::get('products', [WebsiteProductController::class, 'index'])->name('products.index');
    Route::get('product/quickview/{id}', [WebsiteProductController::class, 'quickview'])->name('product.quickview');
    Route::get('product/{slug}', [WebsiteProductController::class, 'show'])->name('product.details');

    Route::post('cart',[CartController::class, 'store'])->name('cart.store');
    Route::get('cart',[CartController::class, 'show'])->name('cart.show');

    Route::get('checkout',[CheckoutController::class, 'create'])->name('checkout');
    Route::post('checkout',[CheckoutController::class, 'store']);

    Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');

    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('wishlist/destroy/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    Route::get('account', [AccountController::class, 'show'])->name('account.show');
    Route::put('account', [AccountController::class, 'update'])->name('account.update');
    Route::put('account/change-password', [AccountController::class, 'update_password'])->name('account.update_password');

    Route::view('about-us', 'website.about-us')->name('about_us');
    Route::view('FAQs', 'website.FAQs')->name('FAQs');

});
