<?php

use App\Http\Middleware\CheckCompanySession;
use App\Http\Middleware\CheckIsAdmin;
use App\Livewire\Company\CompaniesShow;
use App\Livewire\Company\CompanyConfiguration;
use App\Livewire\Company\CompanyCreate;
use App\Livewire\Company\CompanyDashboard;
use App\Livewire\SideBar\Index;
use App\Livewire\Users\AddUserToCompany;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');

Route::middleware(['auth'])->group(function(){
    Route::get('/company/dashboard', CompanyDashboard::class)->name('company.dashboard')->middleware(CheckCompanySession::class);
    Route::get('/company/configuration', CompanyConfiguration::class)->name('company.configuration')->middleware(CheckCompanySession::class)->middleware(CheckIsAdmin::class);
    Route::get('/company/create', CompanyCreate::class)->name('company.create');
    Route::get('/selectUser', AddUserToCompany::class)->name('user.add')->middleware(CheckIsAdmin::class);
    Route::get('/companies', CompaniesShow::class)->name('companies.show');
});


require __DIR__.'/auth.php';
