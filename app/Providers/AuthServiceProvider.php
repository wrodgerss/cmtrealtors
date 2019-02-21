<?php

namespace App\Providers;

use App\Staff;
use App\Task;
use function foo\func;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('profile', function ($user) {
            return !Staff::whereUserId($user->id)->exists();
        });

        Gate::define('admin', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('project-manager', function ($user) {
            return $user->isProjectManager();
        });

        Gate::define('profile-owner', function ($user, $id) {
            return Staff::whereUserId($user->id)->whereId($id)->exists();
        });

        Gate::define('task-owner', function ($user, $id) {
            return Task::whereUserId($user->id)->whereId($id)->exists();
        });

        Gate::before(function ($user, $ability) {
            switch ($ability) {
                case 'profile-owner':
                case 'task-owner':
                    if ($user->isAdmin()) return true;
                    break;
            }
        });
    }
}
