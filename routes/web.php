<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RepoController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::prefix('/notes')->group(function () {
        Route::get('/', [NoteController::class, 'index'])->name('notes.index');
        Route::get('/create', [NoteController::class, 'showFormCreate'])->name('notes.create');
        Route::post('/create', [NoteController::class, 'store'])->name('notes.store');
        Route::get('/edit/{id}', [NoteController::class, 'showFormEdit'])->name('notes.showFormEdit');
        Route::post('/edit/{id}', [NoteController::class, 'update'])->name('notes.update');
        Route::get('/detail/{id}', [NoteController::class, 'show'])->name('notes.show');
        Route::get('/delete/{id}', [NoteController::class, 'destroy'])->name('notes.delete');
        Route::get('/search', [NoteController::class, 'showSearchForm'])->name('notes.showSearchForm');
        Route::post('/search', [NoteController::class, 'search'])->name('notes.search');
    });

    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'showFormCreate'])->name('categories.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'showFormEdit'])->name('categories.showFormEdit');
        Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/detail/{id}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
    });


    Route::prefix('/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'showFormCreate'])->name('products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}', [ProductController::class, 'showFormEdit'])->name('products.showFormEdit');
        Route::post('/edit/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::get('/detail/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'showFormCreate'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'showFormEdit'])->name('users.edit');
        Route::post('edit/{id}/', [UserController::class, 'update'])->name('users.update');
        Route::get('/detail/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    });
    Route::get('/repos',[RepoController::class,'getAll'])->name('repo');

});

Route::prefix('/admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showFormLogin'])->name('admin.showFormLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('/register', [AuthController::class, 'showFormRegister'])->name('admin.showFormRegister');
    Route::post('/register', [AuthController::class, 'register'])->name('admin.register');
});

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect'])->name('login');
Route::get('/callback/{provider}', [SocialController::class, 'callback']);

