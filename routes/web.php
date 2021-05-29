<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryLinkController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductNodeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScrapeProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\WishlistController;
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

Route::resource('/', HomeController::class);
Route::get('/empty', function () {
    Cart::instance('wishlist')->destroy();
    Cart::instance('default')->destroy();
});

Route::resource('/my-account', AccountController::class);
Route::post('/switch-to-cart/{id}', [WishlistController::class, 'switch_to_cart'])->name('switch_to_cart');
Route::resource('/cart', CartController::class);
Route::resource('/wishlist', WishlistController::class);
Route::resource('/contact-us', \App\Http\Controllers\Frontend\ContactUsController::class);
Route::get('/search', [HomeController::class, 'search'])->name('search_product');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('specific_category');
Route::get('/best-promotions', [HomeController::class, 'bestPromotions'])->name('best_promotions');
Route::get('/shopping_lists', [HomeController::class, 'shoppingLists'])->name('shopping_lists');
// Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return view('backend.index');
    })->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('websites', WebsiteController::class);
    Route::resource('currencies', CurrencyController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product-nodes', ProductNodeController::class);
    Route::resource('category-links', CategoryLinkController::class);
    Route::resource('contact', ContactUsController::class);
    Route::get('scrape-products', ScrapeProductController::class)->name('scrape');
});
Route::group(['middleware' => ['auth']], function () {
    Route::post('/update-profile', [ProfileController::class, 'changePassword'])->name('change.password');
    Route::post('/update-password', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('auth/social', [LoginController::class, 'show'])->name('social.login');
Route::get('oauth/{driver}', [LoginController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback', [LoginController::class, 'handleProviderCallback'])->name('social.callback');

require __DIR__ . '/auth.php';
