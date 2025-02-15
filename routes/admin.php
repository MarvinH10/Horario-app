<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::controller(EmpresaController::class)->group(function () {
        Route::get('/empresas', 'index')->name('empresas');
    });

    Route::controller(DepartamentoController::class)->group(function () {
        Route::get('/departamentos', 'index')->name('departamentos');
    });
});
