<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AuthController::class, 'loginView'])->name('admin.login.view');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/file/manager', [AdminController::class, 'fileMan'])->name('admin.file.manager');

Route::get('/admin/category', [CategoryController::class, 'category'])->name('admin.category');
Route::post('/admin/category/add', [CategoryController::class, 'categoryAdd'])->name('admin.category.add');
Route::post('/admin/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('admin.category.edit');
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('admin.category.delete');

Route::get('/admin/sub/category', [CategoryController::class, 'subCategory'])->name('admin.subcategory');
Route::post('/admin/sub/category/add', [CategoryController::class, 'subCategoryAdd'])->name('admin.subcategory.add');
Route::post('/admin/tag/add', [CategoryController::class, 'tagAdd'])->name('admin.tag.add');

Route::get('/admin/movies', [MovieController::class, 'movies'])->name('admin.movies');
Route::get('/admin/movie/add', [MovieController::class, 'movieAdd'])->name('admin.movie.add');
Route::post('/admin/movie/save', [MovieController::class, 'movieSave'])->name('admin.movie.save');
Route::get('/admin/movie/edit/{id}', [MovieController::class, 'movieEdit'])->name('admin.movie.edit');
Route::post('/admin/movie/update/{id}', [MovieController::class, 'movieUpdate'])->name('admin.movie.update');
Route::delete('/admin/movie/delete/{id}', [MovieController::class, 'movieDelete'])->name('admin.movie.delete');
Route::patch('/admin/movie/status/{id}', [MovieController::class, 'status'])->name('admin.movie.status');
Route::patch('/admin/movie/feature/{id}', [MovieController::class, 'feature'])->name('admin.movie.feature');


