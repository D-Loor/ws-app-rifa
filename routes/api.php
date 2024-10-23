<?php

use App\Http\Controllers\LimiteController;
use App\Http\Controllers\RifaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SuerteController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UsuarioController;
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

Route::post('login', [UsuarioController::class, 'login'])->name('login');
Route::get('ticket/validar-ticket/{codigoTicket}/{fecha}',[TicketController::class, 'validarTicket']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('rol', RolController::class);
    Route::resource('usuario', UsuarioController::class);
    Route::resource('rifa', RifaController::class);
    Route::resource('suerte', SuerteController::class);
    Route::resource('ticket', TicketController::class);
    Route::resource('limite', LimiteController::class);


    Route::get('rifas/activas', [RifaController::class, 'rifasActivas']);
    Route::post('usuario/restablecer-password', [UsuarioController::class, 'restablecerPassword']);
    Route::get('ticket/conteo-vendidos/{fecha}/{numero}/{rifa_id}', [TicketController::class, 'conteoVendidos']);
    Route::get('ticket/ticketVendidos/{fechaVenta}',[TicketController::class, 'ticketVendidos']);
    Route::get('ticket/contabilidad/{fecha}',[TicketController::class, 'contabilidad']);
    Route::get('limite/obtener-dia/{dia}' ,[LimiteController::class, 'obtenerLimitePorDia']);
    Route::get('ticket/conteo-tickets-vendidos/{fechaVenta}',[TicketController::class, 'conteoTicketsVendidos']);

});
