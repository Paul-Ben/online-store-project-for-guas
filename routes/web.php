<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;

use App\Http\Controllers\pagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\AdminMiddleware;



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
//     return view('welcome');
// });

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified', 'is_admin'])->name('dashboard');

require __DIR__.'/auth.php';

// Homepage and frontend routes.
Route::get('/', [pagesController::class, 'index'])->name('home');
Route::get('products_page', [pagescontroller::class, 'products'])->name('products_page');
Route::get('contact_page', [pagesController::class, 'contactpage'])->name('contact_page');
Route::get('product_details/{id}', [pagesController::class, 'featured_details_page'])->name('product_details');
Route::get('about_us', [pagesController::class, 'aboutpage'])->name('about_us');
Route::get('categoryProducts/{id}', [pagesController::class, 'categoryProducts'])->name('categoryProducts');

// Backend routes
// Logout route on the dashboard
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Routes handling crud operations for products
Route::resource('products', ProductController::class);
Route::get('all_products', [ProductController::class, 'show_all'])->name('all_products');
Route::get('dashdata', [pagesController::class, 'dashdata'])->name('dashdata');

//Orders
Route::get('orders', [pagesController::class, 'orders'])->name('orders');
Route::get('viewSingleOrder/{id}', [pagesController::class, 'viewSingleOrder'])->name('viewSingleOrder');
Route::delete('deleteOrder/{id}', [pagesController::class, 'deleteOrder'])->name('deleteOrder');
Route::get('editOrder/{id}', [pagesController::class, 'editOrder'])->name('editOrder');
Route::put('updateOrder/{id}', [pagesController::class, 'updateOrder'])->name('updateOrder');
Route::post('closeOrder/{id}', [pagesController::class, 'closeOrder'])->name('closeOrder');
Route::get('myOrder', [pagesController::class, 'myOrder'])->name('myOrder');



// Routes handling crud operations for product categories
Route::resource('categories', CategoryController::class);
Route::get('all_categories', [CategoryController::class, 'show_all'])->name('all_categories');

//cart routes

Route::post('addcart/{id}', [CartController::class, 'store'])->name('addcart');
Route::get('showCart', [CartController::class, 'show'])->name('showCart');
Route::get('cash_order', [CartController::class, 'cash_order'])->name('cash_order');
Route::resource('cart', CartController::class);

Route::resource('contact', ContactController::class);
