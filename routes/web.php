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
