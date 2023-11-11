<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\IsianRencanaSemester;
use App\Models\Mahasiswa;
use App\Policies\IsianRencanaSemesterPolicy;
use App\Policies\MahasiswaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Mahasiswa::class => MahasiswaPolicy::class,
        IsianRencanaSemester::class => IsianRencanaSemesterPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
    }
}
