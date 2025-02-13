<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductCategoryController;

use App\Http\Controllers\Admin\RecycleController;

use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Website\WebsiteShopController;
use App\Http\Controllers\Website\WebsiteBlogController;
use App\Http\Controllers\Website\ProcessController;
use App\Http\Controllers\Website\WebsiteCategoryController;
use App\Http\Controllers\Website\CartController;

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


Route::get('/', [WebsiteController::class, 'index']);
Route::get('about', [WebsiteController::class, 'about']);
Route::get('contact', [WebsiteController::class, 'contact']);

Route::get('shop', [WebsiteShopController::class, 'shop']);
Route::get('shop/details/{slug}', [WebsiteShopController::class, 'details']);

Route::get('blogs', [WebsiteBlogController::class, 'blogs']);
Route::get('blogs/details/{slug}', [WebsiteBlogController::class, 'details']);

Route::post('blogs/comment/submit', [ProcessController::class, 'comment']);
Route::post('contact/review/submit', [ProcessController::class, 'review']);

Route::get('category/{url}', [WebsiteCategoryController::class, 'category']);

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-cart/{productId}', [CartController::class, 'addToCart'])->name('add.cart');
Route::get('add-quantity/{productId}', [CartController::class, 'addQuantity'])->name('add.quantity');
Route::get('decrease-quantity/{productId}', [CartController::class, 'decreaseQuantity'])->name('decrease.quantity');
Route::get('remove-item/{productId}', [CartController::class, 'removeItem'])->name('remove.item');
Route::get('clear', [CartController::class, 'clearcart'])->name('clear');



// admin panel
Route::get('dashboard', [AdminController::class, 'index']);


Route::get('dashboard/user', [UserController::class, 'index']);
Route::get('dashboard/user/add', [UserController::class, 'add']);
Route::get('dashboard/user/edit/{slug}', [UserController::class, 'edit']);
Route::get('dashboard/user/view/{slug}', [UserController::class, 'view']);
Route::post('dashboard/user/submit', [UserController::class, 'insert']);
Route::post('dashboard/user/update', [UserController::class, 'update']);
Route::get('dashboard/user/softdelete/{id}', [UserController::class, 'softdelete']);
Route::post('dashboard/user/restore', [UserController::class, 'restore']);
Route::post('dashboard/user/delete', [UserController::class, 'delete']);


Route::get('dashboard/category', [ProductCategoryController::class, 'index']);
Route::get('dashboard/category/add', [ProductCategoryController::class, 'add']);
Route::get('dashboard/category/edit/{slug}', [ProductCategoryController::class, 'edit']);
Route::get('dashboard/category/view/{slug}', [ProductCategoryController::class, 'view']);
Route::post('dashboard/category/submit', [ProductCategoryController::class, 'insert']);
Route::post('dashboard/category/update', [ProductCategoryController::class, 'update']);
Route::get('dashboard/category/softdelete/{id}', [ProductCategoryController::class, 'softdelete']);
Route::post('dashboard/category/restore', [ProductCategoryController::class, 'restore']);
Route::post('dashboard/category/delete', [ProductCategoryController::class, 'delete']);


Route::get('dashboard/product', [ProductController::class, 'index']);
Route::get('dashboard/product/add', [ProductController::class, 'add']);
Route::get('dashboard/product/edit/{slug}', [ProductController::class, 'edit']);
Route::get('dashboard/product/view/{slug}', [ProductController::class, 'view']);
Route::post('dashboard/product/submit', [ProductController::class, 'insert']);
Route::post('dashboard/product/update', [ProductController::class, 'update']);
Route::get('dashboard/product/softdelete/{id}', [ProductController::class, 'softdelete']);
Route::post('dashboard/product/restore', [ProductController::class, 'restore']);
Route::post('dashboard/product/delete', [ProductController::class, 'delete']);

Route::get('dashboard/article', [ArticleController::class, 'index']);
Route::get('dashboard/article/add', [ArticleController::class, 'add']);
Route::get('dashboard/article/edit/{slug}', [ArticleController::class, 'edit']);
Route::get('dashboard/article/view/{slug}', [ArticleController::class, 'view']);
Route::post('dashboard/article/submit', [ArticleController::class, 'insert']);
Route::post('dashboard/article/update', [ArticleController::class, 'update']);
Route::get('dashboard/article/softdelete/{id}', [ArticleController::class, 'softdelete']);
Route::post('dashboard/article/restore', [ArticleController::class, 'restore']);
Route::post('dashboard/article/delete', [ArticleController::class, 'delete']);


Route::get('dashboard/blogs', [BlogController::class, 'index']);
Route::get('dashboard/blogs/add', [BlogController::class, 'add']);
Route::get('dashboard/blogs/edit/{slug}', [BlogController::class, 'edit']);
Route::get('dashboard/blogs/view/{slug}', [BlogController::class, 'view']);
Route::post('dashboard/blogs/submit', [BlogController::class, 'insert']);
Route::post('dashboard/blogs/update', [BlogController::class, 'update']);
Route::get('dashboard/blogs/softdelete/{id}', [BlogController::class, 'softdelete']);
Route::post('dashboard/blogs/restore', [BlogController::class, 'restore']);
Route::post('dashboard/blogs/delete', [BlogController::class, 'delete']);

Route::get('dashboard/team', [TeamController::class, 'index']);
Route::get('dashboard/team/add', [TeamController::class, 'add']);
Route::get('dashboard/team/edit/{slug}', [TeamController::class, 'edit']);
Route::get('dashboard/team/view/{slug}', [TeamController::class, 'view']);
Route::post('dashboard/team/submit', [TeamController::class, 'insert']);
Route::post('dashboard/team/update', [TeamController::class, 'update']);
Route::get('dashboard/team/softdelete/{id}', [TeamController::class, 'softdelete']);
Route::post('dashboard/team/restore', [TeamController::class, 'restore']);
Route::post('dashboard/team/delete', [TeamController::class, 'delete']);

Route::get('dashboard/contact', [ContactController::class, 'index']);
Route::get('dashboard/contact/add', [ContactController::class, 'add']);
Route::get('dashboard/contact/edit/{slug}', [ContactController::class, 'edit']);
Route::get('dashboard/contact/view/{slug}', [ContactController::class, 'view']);
Route::post('dashboard/contact/submit', [ContactController::class, 'insert']);
Route::post('dashboard/contact/update', [ContactController::class, 'update']);
Route::get('dashboard/contact/softdelete/{id}', [ContactController::class, 'softdelete']);
Route::post('dashboard/contact/restore', [ContactController::class, 'restore']);
Route::post('dashboard/contact/delete', [ContactController::class, 'delete']);


Route::get('dashboard/recycle', [RecycleController::class, 'index']);
Route::get('dashboard/recycle/all', [RecycleController::class, 'all']);
Route::post('dashboard/recycle/restore', [RecycleController::class, 'restore']);
Route::post('dashboard/recycle/delete', [RecycleController::class, 'delete']);


require __DIR__.'/auth.php';
