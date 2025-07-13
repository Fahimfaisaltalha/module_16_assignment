<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// --- Previous Routes ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/resume', [PageController::class, 'resume'])->name('resume');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');




// This route handles the form submission
Route::post('/contact-submit', [PageController::class, 'submitContact'])->name('contact.submit');

// This route displays the confirmation page
Route::get('/contact/success', [PageController::class, 'contactConfirmation'])->name('contact.confirmation');
