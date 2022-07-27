<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WayController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home',[HomeController::class,'index'])->name('home');
    
    Route::get('/way/cadastro/',[WayController::class,'createWayView']);
    Route::post('/way/cadastro/',[WayController::class,'createWay'])->name('way.create');
    Route::get('/way/lista',[WayController::class,'listWayView'])->name('way.list');
    Route::get('/ways/editar/{id}',[WayController::class, 'editWayView'])->name('ways.edit');
    Route::post('/ways/atualizar/{id}',[WayController::class,'updateWay'])->name('way.update');
    Route::get('/ways/delete/{id}',[WayController::class,'deleteWay'])->name('way.delete');
});
