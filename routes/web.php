<?php

use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RentController::class, 'index']);
Route::post('/rent', [RentController::class, 'store'])->name('rent.store');
