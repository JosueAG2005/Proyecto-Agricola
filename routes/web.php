<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganicoController;
use App\Http\Controllers\MaquinariaController;
use App\Http\Controllers\GanadoController;
use App\Http\Controllers\TipoAnimalController;
use App\Http\Controllers\TipoPesoController;
use App\Http\Controllers\DatoSanitarioController;
use App\Http\Controllers\RazaController;

// 1) Raíz -> login (pantalla principal)
Route::redirect('/', '/login');

// 2) Login (solo UI)
Route::view('/login', 'public.auth.login')->name('login.demo');
// Registro (solo UI)
Route::view('/registro', 'public.auth.register')->name('register.demo');


// 3) Home público (portada con hero)
Route::view('/inicio', 'public.home')->name('home');

// 4) Páginas públicas
Route::view('/anuncios', 'public.ads.index')->name('ads.index');
Route::view('/publicar', 'public.ads.create')->name('ads.create');

// 5) CRUDs (panel)
Route::resource('organicos', OrganicoController::class)->names('organicos');
Route::resource('maquinarias', MaquinariaController::class)->names('maquinarias');


Route::resource('categorias', App\Http\Controllers\CategoriaController::class);


Route::resource('ganados', GanadoController::class);

Route::resource('tipo_animals', TipoAnimalController::class);
Route::resource('tipo-pesos', TipoPesoController::class);
Route::resource('datos-sanitarios', DatoSanitarioController::class);
Route::resource('razas', RazaController::class);






