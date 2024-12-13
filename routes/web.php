<?php

use App\Livewire\Companies\CompaniesIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/companies','companies_dashboard')->name('companies.index');




require __DIR__ . '/auth.php';
