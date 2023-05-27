<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/travel-portal', function () {
    return view('frontend.pages.travel-portal');
})->name('travel-portal');

Route::get('/hotel-suppliers', [FaqController::class, 'hotel_suppliers'])->name('hotel-suppliers');

Route::get('/flight-suppliers', [FaqController::class, 'flight_suppliers'])->name('flight-suppliers');

Route::get('/privacy', [FaqController::class, 'privacy_policies'])->name('privacy');

Route::get('/terms', [FaqController::class, 'terms_and_conditions'])->name('terms');

Route::get('/pricing', [PackageController::class, 'index'])->name('pricing');

Route::get('/cart/{plan_id}', [CartController::class, 'index'])->name('cart.select.plan');
Route::post('/cart/{plan_id}', [CartController::class, 'store'])->name('cart.store.plan');
Route::get('/cart/{plan_id}/pay-confirmation', [CartController::class, 'confirmation'])->name('cart.confirmation');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/invoice/{id}', [InvoiceController::class, 'download'])->name('invoice.download');
