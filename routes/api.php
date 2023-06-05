<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDetalleCompra;
use App\Http\Controllers\ApiEncabezadoCompra;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/compras',[ApiDetalleCompra::class, 'index']);
Route::post('/compras',[ApiDetalleCompra::class, 'store']);
Route::put('/compras/{id}',[ApiDetalleCompra::class, 'update']);
Route::delete('/compras/{id}',[ApiDetalleCompra::class, 'destroy']);
Route::get('/compras/{id}',[ApiDetalleCompra::class, 'show']);

Route::get('/encabezado',[ApiEncabezadoCompra::class, 'index']);
Route::post('/encabezado',[ApiEncabezadoCompra::class, 'store']);
Route::put('/encabezado/{id}',[ApiEncabezadoCompra::class, 'update']);
Route::delete('/encabezado/{id}',[ApiEncabezadoCompra::class, 'destroy']);
Route::get('/encabezado/{id}',[ApiEncabezadoCompra::class, 'show']);

