<?php

use App\Livewire\CompaniesShow;
use App\Livewire\CompanyCreate;
use App\Livewire\Dashboard;
use App\Livewire\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', Dashboard::class)->name('company.dashboard');
    Route::get('/company/create', CompanyCreate::class)->name('company.create');
    Route::get('/companies', CompaniesShow::class)->name('companies.show');
});


require __DIR__ . '/auth.php';
