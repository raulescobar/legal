<?php

use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\ComercialController;
use App\Http\Controllers\ContratacionController;
use App\Http\Controllers\LaboralController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\TributarioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('questions',QuestionController::class)->names('questions');
    Route::POST('/questions/delete/{id}',[QuestionController::class, 'delete']);

    Route::resource('laboral', LaboralController::class)->names('laboral');
    Route::resource('tributario', TributarioController::class)->names('tributario');
    Route::resource('administracion', AdministracionController::class)->names('administracion');
    Route::resource('comercial', ComercialController::class)->names('comercial');
    Route::resource('contratacion', ContratacionController::class)->names('contratacion');

    Route::resource('users', UserController::class)->names('users');
    Route::resource('response', ResponseController::class)->names('response');

    
});


