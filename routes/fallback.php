<?php

use App\Http\Controllers\NotFoundController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::fallback([NotFoundController::class, 'index'])->name('not.found');