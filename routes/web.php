<?php

use App\Livewire\Companies\CompaniesIndex;
use App\Livewire\CompaniesShow;
use App\Livewire\CompanyCreate;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/dashboard', Dashboard::class)->name('company.dashboard');
Route::get('/company/create', CompanyCreate::class)->name('company.create');
Route::get('/companies', CompaniesShow::class)->name('companies.show');

require __DIR__ . '/auth.php';
