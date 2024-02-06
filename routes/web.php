<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('items',ItemController::class)
    ->only(['index','store','edit','update','destroy'])
    ->middleware(['auth']);

Route::resource('orders',OrderController::class)
    ->only(['index','store']);

Route::get('/cart',[ShoppingCartcontroller::class,'index'])->name('cart.index');
Route::post('/cart/store/{item}',[ShoppingCartcontroller::class,'store'])->name('cart.store');
Route::delete('/cart/remove/{item}',[ShoppingCartcontroller::class,'remove'])->name('cart.remove');

Route::get('/items/search',[ItemController::class, 'search'])->name('items.search');

Route::resource('categories',CategoryController::class)
    ->only(['index','store','edit','update','destroy'])
    ->middleware(['auth']);

Route::resource('orders',OrderController::class)
    ->only(['index','store']);

require __DIR__.'/auth.php';
