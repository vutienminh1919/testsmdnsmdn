<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
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
Route::prefix('/notes')->group(function (){
    route::get('/',[NoteController::class,'index'])->name('notes.index');
    route::get('/create',[NoteController::class,'showFormCreate'])->name('notes.create');
    route::post('/create',[NoteController::class,'store'])->name('notes.store');
    route::get('/edit/{id}',[NoteController::class,'showFormEdit'])->name('notes.showFormEdit');
    route::post('/edit/{id}',[NoteController::class,'update'])->name('notes.update');
    route::get('/detail/{id}',[NoteController::class,'show'])->name('notes.show');
    route::get('/delete/{id}',[NoteController::class,'destroy'])->name('notes.delete');

});
Route::prefix('/categories')->group(function (){
    route::get('/',[CategoryController::class,'index'])->name('categories.index');
    route::get('/create',[CategoryController::class,'showFormCreate'])->name('categories.create');
    route::post('/create',[CategoryController::class,'store'])->name('categories.store');
    route::get('/edit/{id}',[CategoryController::class,'showFormEdit'])->name('categories.showFormEdit');
    route::post('/edit/{id}',[CategoryController::class,'update'])->name('categories.update');
    route::get('/detail/{id}',[CategoryController::class,'show'])->name('categories.show');
    route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('categories.delete');
});
