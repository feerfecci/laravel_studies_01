<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');


////route com validação em contrainsts

//numero:
Route::get('/exp1/{value}', function ($value) {
    echo  $value;
})->where('value', '[0-9]+');

//letras A-Z miuscula a-z minuscula
Route::get('/exp2/{value}', function ($value) {
    echo  $value;
})->where('value', '[A-Za-z  0-9]+');

//determinar tipo de caracter em cada parametro
Route::get('/exp3/{value1}/{value2}', function ($value) {
    echo  $value;
})->where([
    'value1' => '[0-9]',
    'value2' => 'A-Z'
]);



//////Route Names

Route::get('/rota_abc', function () {
    return "rota nomeada";
})->name('rota_nomeada');

Route::get('/rota_referenciada', function () {
    ////redirecionando para a rota que tem name
    return redirect()->route('rota_nomeada');
});

Route::prefix('/admin')->group(function () {
    Route::get('/home', [MainController::class, 'index']);
    Route::get('/about', [MainController::class, 'about']);
    Route::get('/managment', [MainController::class, 'managment']);
});


/////middleware
Route::get('/admin/only', function () {
    echo "apenas admin";
})->middleware([OnlyAdmin::class]);


Route::middleware(OnlyAdmin::class)->group(function () {
    Route::get('/admin/only2', function () {
        echo "apenas admin 2";
    });
    Route::get('/admin/only3', function () {
        echo "apenas admin 3";
    });
});



///chamando um grupo somente com um controller
// Route::get('/new', [UserController::class, 'new']);
// Route::get('/edit', [UserController::class, 'edit']);
// Route::get('/delete', [UserController::class, 'delete']);
//>>>>>>>>>>>>> vira esse:
Route::controller(UserController::class)->group(function () {
    Route::get('/user/new', 'new');
    Route::get('/user/edit', 'edit');
    Route::get('/user/delete', 'delete');
});


//se nenhuma rota for encontrada

Route::fallback(function(){
    echo "pagina não encontrada";
});