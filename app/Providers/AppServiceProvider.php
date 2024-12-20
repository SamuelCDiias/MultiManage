<?php

namespace App\Providers;

use App\Models\CompanyAccess;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('is-admin', function ($user) {

            $companyId = session('active_company');

            Log::info('Gate is-admin: ', [
                'user' => $user->id ?? null,
                'companyId' => $companyId,
            ]);

            $companyAccess = CompanyAccess::where('user_id', $user->id)
                ->where('company_id', $companyId)
                ->first();

                Log::info('Company Access: ', [
                    'role' => $companyAccess->role ?? null,
                ]);

            return $companyAccess && $companyAccess->role === 'admin';
        });
    }
}
