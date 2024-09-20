<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\Padron\JRVController;
use App\Http\Controllers\Padron\EleccionController;
use App\Http\Controllers\Padron\CantonController;
use App\Http\Controllers\Padron\CircunscripcionController;
use App\Http\Controllers\Padron\DistritoController;
use App\Http\Controllers\Padron\PadronElectoralController;
use App\Http\Controllers\Padron\PaisController;
use App\Http\Controllers\Padron\ParroquiaController;
use App\Http\Controllers\Padron\ProvinciaController;
use App\Http\Controllers\Padron\RecintoController;
use App\Http\Controllers\Padron\ZonaController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PermisoRolController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TerritorioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VoluntarioController;
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

Route::post('login', [UsuarioController::class, 'login'])->name('login');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('rol', RolController::class);
    Route::resource('usuario', UsuarioController::class);

});