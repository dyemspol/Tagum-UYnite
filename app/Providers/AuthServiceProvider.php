<?php

namespace App\Providers;

use App\Models\Reaction;
use App\Policies\ReactionPolicy;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as Provider;
// FIX: Use the Gate Facade from Illuminate\Support\Facades\Gate
use Illuminate\Support\Facades\Gate;
class AuthServiceProvider extends Provider
{
    protected $policies = [
    Reaction::class => ReactionPolicy::class,
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('only-user', function (User $user) {
            return $user->role === 'user';
        });
    }
}
