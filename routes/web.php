<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno',
    [AlunoController::class,'index'])->name('aluno.index');

Route::get('/aluno/create',
     [AlunoController::class,'create'])->name('aluno.create');

Route::post('/aluno/store',
     [AlunoController::class,'store'])->name('aluno.store');

Route::delete('aluno/{id}',
     [AlunoController::class,'destroy'])
     ->name('aluno.destroy');

Route::get('/aluno/edit/{id}',
     [AlunoController::class,'edit'])->name('aluno.edit');

Route::put('/aluno/update/{id}',
     [AlunoController::class,'update'])->name('aluno.update');

     Route::post('/aluno/search',
     [AlunoController::class,'search'])->name('aluno.search');
