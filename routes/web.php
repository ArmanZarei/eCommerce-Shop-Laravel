<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Auth\SocialiteAuthController;
use App\Http\Controllers\Front\CommentRateController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\WishListController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product}', [FrontProductController::class, 'show'])->name('front.product.show');
Route::get('/categories/{category:slug}', [FrontCategoryController::class, 'show'])->name('front.category.show');

Route::get('/login/activate', [ActivationController::class, 'activationPage'])->name('activation.page')->middleware(['auth', 'user.inactive']);
Route::post('/login/activate', [ActivationController::class, 'handleActivation'])->name('activation.action')->middleware(['auth', 'user.inactive']);
Route::get('/login/{provider}/', [SocialiteAuthController::class, 'redirectToProvider'])->name('provider.login');
Route::get('/login/{provider}/callback', [SocialiteAuthController::class, 'handleProviderCallback']);

Route::post('/products/{product}/comments', [CommentRateController::class, 'store'])->name('comment.create');

Route::put('/products/{product}/wishlist', [WishListController::class, 'toggleProduct'])->name('products.wishlist.toggle')->middleware('auth');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::resource('brands', BrandController::class)->except(['destroy', 'show']);
    Route::resource('attributes', AttributeController::class)->except(['destroy', 'show']);
    Route::resource('tags', TagController::class)->except(['destroy', 'show']);
    Route::resource('categories', CategoryController::class)->except(['destroy', 'show']);
    Route::resource('products', ProductController::class)->except(['destroy', 'show']);

    Route::resource('banners', BannerController::class)->except('show');

    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::put('/comments/{comment}', [CommentController::class, 'changeStatus'])->name('comments.update.status');
});

Route::get('test-activation', function () {
    dd("You're OK!");
})->middleware(['auth', 'user.active']);
