<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FabricanteController;

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
    //return view('welcome', ['nombre' => 'Rafa', 'ciudad' => 'Santiago de Compostela']);
    return view('layouts.master');
});


Route::resource('fabricantes', FabricanteController::class);
