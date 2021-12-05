<?php

use App\Http\Controllers\Auth\LoginJwtController;
use App\Http\Controllers\BoloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ListaInteresseController;
use App\Http\Controllers\TipoBoloController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginJwtController::class, 'login'])->name('login');
Route::get('logout', [LoginJwtController::class, 'logout'])->name('logout');
Route::get('refresh', [LoginJwtController::class, 'refresh'])->name('refresh');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('tipo_bolos', TipoBoloController::class);
    Route::resource('bolos', BoloController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('lista_interesses', ListaInteresseController::class);
});





