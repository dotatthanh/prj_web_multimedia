<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WebController;

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

Route::prefix('admin')->group(function () {
	Route::middleware(['auth'])->group(function () {
		Route::resource('users', UserController::class);
		Route::get('/users/view-change-password/{user}', [UserController::class, 'viewChangePassword'])->name('users.view-change-password');
		Route::post('/users/change-password/{user}', [UserController::class, 'changePassword'])->name('users.change-password');

		Route::resource('roles', RoleController::class);
		Route::resource('permissions', PermissionController::class);
		Route::resource('customers', CustomerController::class);
		Route::resource('categories', CategoryController::class);
		Route::resource('infos', InfoController::class);
		Route::resource('contacts', ContactController::class);
		Route::resource('news', NewsController::class);

		Route::resource('products', ProductController::class);
		Route::post('/products/change-status/{product}', [ProductController::class, 'changeStatus'])->name('products.change-status');
	});
	require __DIR__.'/auth.php';
});

// middleware check nếu ---CHƯA ĐĂNG NHẬP--- thì k vào đc
// Route::middleware(['website'])->group(function () {
	Route::get('/thong-tin-ca-nhan', [WebController::class, 'profile'])->name('web.profile');
	Route::get('/doi-mat-khau', [WebController::class, 'viewChangePassword'])->name('web.change-password');
	Route::post('/post-change-password', [WebController::class, 'changePassword'])->name('web.post-change-password');
	Route::get('/dang-san-pham', [WebController::class, 'viewPostProduct'])->name('web.view-post-product');
	Route::post('/post-dang-san-pham', [WebController::class, 'postProduct'])->name('web.post-product');
// });
	Route::post('/logout', [WebController::class, 'logout'])->name('web.logout');







	
	Route::get('/', [WebController::class, 'index'])->name('web.index');
	Route::get('/tim-kiem', [WebController::class, 'search'])->name('web.search');
// middleware check nếu ---ĐĂNG NHẬP RỒI--- thì k vào đc
// Route::middleware(['guest_web'])->group(function () {
	Route::get('/dang-nhap', [WebController::class, 'login'])->name('web.login');
	Route::post('/post-login', [WebController::class, 'postLogin'])->name('web.post-login');
	Route::get('/dang-ky', [WebController::class, 'register'])->name('web.register');
	Route::post('/post-register', [WebController::class, 'postRegister'])->name('web.post-register');
	Route::get('/quen-mat-khau', [WebController::class, 'viewForgotPassword'])->name('web.view-forgot-password');
	Route::post('/quen-mat-khau', [WebController::class, 'forgotPassword'])->name('web.forgot-password');
// });




	Route::get('/danh-muc-san-pham/{id}', [WebController::class, 'categoryProduct'])->name('web.category-product');
	Route::get('/chi-tiet-san-pham/{id}', [WebController::class, 'productDetail'])->name('web.product-detail');
	Route::get('/danh-muc-tin-tuc/{id}', [WebController::class, 'categoryNews'])->name('web.category-news');
	Route::get('/chi-tiet-tin-tuc/{id}', [WebController::class, 'newsDetail'])->name('web.news-detail');
	Route::get('/lien-he', [WebController::class, 'contact'])->name('web.contact');
	Route::post('/post-lien-he', [WebController::class, 'postContact'])->name('web.post-contact');