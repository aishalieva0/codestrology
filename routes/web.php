<?php

use App\Http\Controllers\ZodiacController;
use Illuminate\Support\Facades\Route;

Route::get('/zodiac', [ZodiacController::class, 'show'])->name('zodiac.show');