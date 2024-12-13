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
Route::view('/company/create', 'company_create')->name('company.create');




require __DIR__ . '/auth.php';
