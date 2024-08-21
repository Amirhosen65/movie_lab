<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontEndController::class, 'index'])->name('root');
Route::get('/search', [FrontEndController::class, 'search'])->name('search');

Auth::routes();

require __DIR__.'/admin.php';
require __DIR__.'/user.php';

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/customer/login', [CustomerController::class, 'customer_login'])->name('customer.login');
Route::post('/customer/registration', [CustomerController::class, 'register'])->name('customer.registration');
Route::get('/customer/registration', [CustomerController::class, 'register_view'])->name('customer.registration.view');
Route::get('/customer/all', [CustomerController::class, 'customers'])->name('customers.view');
Route::get('/customer/delete', [UserController::class, 'delete'])->name('user.delete');

Route::get('/movie/{slug}', [FrontEndController::class, 'movieDetails'])->name('movie.details');
Route::get('/category/{slug}', [FrontEndController::class, 'cateMovie'])->name('cate.movie');
Route::get('/genre/{slug}', [FrontEndController::class, 'genreMovie'])->name('genre.movie');



Route::post('/name/update/{id}', [ProfileController::class, 'name_update'])->name('profile.name.update');
Route::post('/email/update/{id}', [ProfileController::class, 'email_update'])->name('profile.email.update');
Route::post('/password/update/{id}', [ProfileController::class, 'password_update'])->name('profile.password.update');
Route::post('/image/update/{id}', [ProfileController::class, 'image_update'])->name('profile.image.update');
