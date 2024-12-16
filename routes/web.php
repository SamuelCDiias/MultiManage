<?php

use App\Http\Middleware\CheckCompanySession;
use App\Livewire\AddUserToCompany;
use App\Livewire\CompaniesShow;
use App\Livewire\CompanyConfiguration;
use App\Livewire\CompanyCreate;
use App\Livewire\Dashboard;
use App\Livewire\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');

Route::middleware(['auth'])->group(function(){
    Route::get('/company/dashboard', Dashboard::class)->name('company.dashboard')->middleware(CheckCompanySession::class);
    Route::get('/company/configuration', CompanyConfiguration::class)->name('company.configuration')->middleware(CheckCompanySession::class);
    Route::get('/company/create', CompanyCreate::class)->name('company.create');
    Route::get('/companies', CompaniesShow::class)->name('companies.show');
    Route::get('/selectUser', AddUserToCompany::class)->name('user.add');

});


require __DIR__ . '/auth.php';
