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
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Website;
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
Cart::destroy();
});

Route::resource('/cart', CartController::class);
Route::resource('/wishlist', WishlistController::class);
Route::resource('contact-us', \App\Http\Controllers\Frontend\ContactUsController::class);
Route::get('search', [HomeController::class, 'search'])->name('search_product');
Route::get('/category/{slug}', function ($slug) {
    $selected_category = Category::where('slug', $slug)->with('products')->firstOrFail()->withCount('products')->get();
    $products = Product::with('category')->take(6)->get();
    $product_max_price = Product::max('price');
    $product_min_price = Product::min('price');
    $brands = Product::groupBy('brand')->get();
    $categories = Category::with('products')->withCount('products')->get();
    $websites = Website::with('products')->withCount('products')->get();
    return view('frontend.category', compact('products', 'categories', 'websites', 'selected_category', 'brands', 'product_max_price', 'product_min_price'));
})->name('specific_category');

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

Route::get('auth/social', [LoginController::class, 'show'])->name('social.login');
Route::get('oauth/{driver}', [LoginController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback', [LoginController::class, 'handleProviderCallback'])->name('social.callback');

require __DIR__ . '/auth.php';
