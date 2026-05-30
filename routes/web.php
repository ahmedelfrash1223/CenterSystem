<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\SettingController::class, 'index'])->name('home');
