<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('/',\App\Http\Controllers\HomePageController::class);


Route::prefix('dashboard')->group(function () {

    // ==================================== dashboard main page
//    Route::view('/', 'dashboard')->name('dashboard')->withoutMiddleware('auth');
    Route::view('/', 'dashboard')->middleware('test:abeer')->name('dashboard');
    // ============================================= products
//    Route::get('products/show/{product}',[ProductController::class,'show'])->name('products.show');
//    Route::resource('products', ProductController::class)->except('show')->parameters(['products'=>'product:slug']);
    Route::get('products/show/{product}',[ProductController::class,'show'])->name('products.show');
    Route::resource('products', ProductController::class)->except('show');
});



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

 require __DIR__.'/auth.php';
