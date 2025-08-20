<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;

Route::get('/formulaire', [InscriptionController::class, 'create'])->name('inscriptions.create');
Route::post('/formulaire', [InscriptionController::class, 'store'])->name('inscriptions.store');

Route::get('/listing', [InscriptionController::class, 'index'])->name('inscriptions.index');

Route::post('/toggle-priorite/{inscription}', [InscriptionController::class, 'togglePriorite'])
    ->name('inscriptions.togglePriorite');

    Route::get('/inscriptions/{inscription}/edit', [InscriptionController::class, 'edit'])->name('inscriptions.edit');
Route::put('/inscriptions/{inscription}', [InscriptionController::class, 'update'])->name('inscriptions.update');
Route::delete('/inscriptions/{inscription}', [InscriptionController::class, 'destroy'])->name('inscriptions.destroy');
