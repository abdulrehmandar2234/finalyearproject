<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryLinkController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductNodeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScrapeProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsiteController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/', function () {return view('backend.index');})->name('dashboard');
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
        Route::get('scrape-products', ScrapeProductController::class)->name('scrape');
    });
});

require __DIR__ . '/auth.php';
