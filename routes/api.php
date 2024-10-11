<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProdukController;
use App\Http\Controllers\api\KategoriController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('kategori/api', KategoriController::class); 
Route::post('kategori/api/search', [KategoriController::class,'search']);

Route::apiResource('produk/api', ProdukController::class); 
Route::post('produk/api/search', [ProdukController::class,'search']);
