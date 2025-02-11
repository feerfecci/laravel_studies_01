<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/init', [MainController::class, 'initMethod'])->name('init');
Route::get('/view', [MainController::class, 'homePage'])->name('home');

Route::get('/single', SingleActionController::class)->name('single');


//// para criar as rotas do user direto pelo resource
Route::resource('user', UserController::class);

Route::resources(['clients'=>ClientsController::class,'products'=>ProductsController::class]);