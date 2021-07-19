<?php

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
Route::get('/category/price_filter', [\App\Http\Controllers\Frontend\CategoryController::class, 'priceFilter'])->name('category.priceFilter');
Route::resource('/', \App\Http\Controllers\Frontend\HomeController::class);
Route::get('/empty', function () {
    Cart::instance('wishlist')->destroy();
    Cart::instance('default')->destroy();
});

Route::resource('/my-account', \App\Http\Controllers\Frontend\AccountController::class);
Route::post('/switch-to-cart/{id}', [\App\Http\Controllers\Frontend\WishlistController::class, 'switch_to_cart'])->name('switch_to_cart');
Route::resource('/cart', \App\Http\Controllers\Frontend\CartController::class);
Route::resource('/wishlist', \App\Http\Controllers\Frontend\WishlistController::class);
Route::resource('/contact-us', \App\Http\Controllers\Frontend\ContactUsController::class);
Route::get('/search', [\App\Http\Controllers\Frontend\SearchController::class, 'search'])->name('search_product');
Route::get('/category/{slug}', [\App\Http\Controllers\Frontend\CategoryController::class, 'index'])->name('specific_category');

Route::get('/best-promotions', [\App\Http\Controllers\Frontend\BestPromotionController::class, 'index'])->name('best_promotions');
Route::get('/best-promotions/price_filter', [\App\Http\Controllers\Frontend\BestPromotionController::class, 'priceFilter'])->name('best_promotions.priceFilter');
Route::get('/shopping_lists', [\App\Http\Controllers\Frontend\ShoppingListController::class, 'index'])->name('shopping_lists');
Route::get('/shopping_lists/price_filter', [\App\Http\Controllers\Frontend\ShoppingListController::class, 'priceFilter'])->name('shopping_lists.priceFilter');
Route::get('/search/price_filter', [\App\Http\Controllers\Frontend\SearchController::class, 'priceFilter'])->name('search.priceFilter');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        $users = \App\Models\User::count();
        $products = \App\Models\Product::count();
        $categories = \App\Models\Category::count();
        $websites = \App\Models\Website::count();
        return view('backend.index', compact('users', 'products', 'categories', 'websites'));
    })->name('dashboard');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    Route::resource('websites', \App\Http\Controllers\Admin\WebsiteController::class);
    Route::resource('currencies', \App\Http\Controllers\Admin\CurrencyController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('product-nodes', \App\Http\Controllers\Admin\ProductNodeController::class);
    Route::resource('category-links', \App\Http\Controllers\Admin\CategoryLinkController::class);
    Route::resource('contact', \App\Http\Controllers\Admin\ContactUsController::class);
    Route::resource('advertising', \App\Http\Controllers\Admin\AdvertisingController::class);
    Route::get('scrape-products', \App\Http\Controllers\Admin\ScrapeProductController::class)->name('scrape');
});
Route::group(['middleware' => ['auth']], function () {
    Route::post('/update-profile', [\App\Http\Controllers\Frontend\ProfileController::class, 'changePassword'])->name('change.password');
    Route::post('/update-password', [\App\Http\Controllers\Frontend\ProfileController::class, 'update'])->name('profile.update');
});

//Route::get('auth/social', [LoginController::class, 'show'])->name('social.login');
//Route::get('oauth/{driver}', [LoginController::class, 'redirectToProvider'])->name('social.oauth');
//Route::get('oauth/{driver}/callback', [LoginController::class, 'handleProviderCallback'])->name('social.callback');

require __DIR__ . '/auth.php';
