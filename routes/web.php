<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
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
Route::prefix('/notes')->group(function (){
    Route::get('/',[NoteController::class,'index'])->name('notes.index');
    Route::get('/create',[NoteController::class,'showFormCreate'])->name('notes.create');
    Route::post('/create',[NoteController::class,'store'])->name('notes.store');
    Route::get('/edit/{id}',[NoteController::class,'showFormEdit'])->name('notes.showFormEdit');
    Route::post('/edit/{id}',[NoteController::class,'update'])->name('notes.update');
    Route::get('/detail/{id}',[NoteController::class,'show'])->name('notes.show');
    Route::get('/delete/{id}',[NoteController::class,'destroy'])->name('notes.delete');
    Route::post('/search',[NoteController::class,'search'])->name('notes.search');

});
Route::prefix('/categories')->group(function (){
    Route::get('/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/create',[CategoryController::class,'showFormCreate'])->name('categories.create');
    Route::post('/create',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{id}',[CategoryController::class,'showFormEdit'])->name('categories.showFormEdit');
    Route::post('/edit/{id}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('/detail/{id}',[CategoryController::class,'show'])->name('categories.show');
    Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('categories.delete');
});
Route::prefix('/admin')->group(function (){
    Route::get('/login',[AuthController::class,'showFormLogin'])->name('admin.showFormLogin');
    Route::post('/login',[AuthController::class,'login'])->name('admin.login');
    Route::get('/register',[AuthController::class,'showFormRegister'])->name('admin.showFormRegister');
    Route::post('/register',[AuthController::class,'register'])->name('admin.register');
});
