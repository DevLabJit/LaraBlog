<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
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


/*Route::get('/', [BlogController::class, 'index'])->name('home');*/




// CATEGORIES :

Route::get('/categories/list', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/posts/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/category/create/add/new', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/category/store/new', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');



/*Route::resource('categories', CategoryController::class);*/
Route::resource('posts', PostController::class);