<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function (){
    
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/', [DashboardController::class, 'dashboard']);
    
    Route::resource('kategori', KategoriController::class); 
    Route::post('kategori/search', [KategoriController::class,'search']);
    
    Route::resource('produk', ProdukController::class); 
    Route::post('produk/search', [ProdukController::class,'search']);
    
});

require __DIR__.'/auth.php';
