<?php

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

Route::get('/ticket', function () {
    $fecha = "23/9/2024";
    $vendedor = "DiegoLM";
    $numero = "031";
    $valor = "1";
    $premio1 = "580";
    $premio2 = "100";
    $premio3 = "25";
    $premio4 = "15";
    $premio5 = "10";
    $premio6 = "10";
    $premio7 = "5";

    return view('pdfs/ticket', compact('fecha', 'vendedor', 'numero', 'valor', 'premio1', 'premio2', 'premio3', 'premio4', 'premio5', 'premio6', 'premio7'));
});
