<?php

namespace App\Providers;

use App\Policies\ClockInPolicy;
use App\Policies\TaskPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Task
        Gate::define('view-task', [TaskPolicy::class, 'view']);
        Gate::define('create-task', [TaskPolicy::class, 'create']);
        Gate::define('update-task', [TaskPolicy::class, 'update']);
        Gate::define('delete-task', [TaskPolicy::class, 'delete']);
        Gate::define('restore-task', [TaskPolicy::class, 'restore']);
        Gate::define('force-delete-task', [TaskPolicy::class, 'forceDelete']);

        // Leave

        // Clock-in
        Gate::define('clock-in', [ClockInPolicy::class, 'clockIn']);
        Gate::define('clock-out', [ClockInPolicy::class, 'clockOut']);
    }
}
