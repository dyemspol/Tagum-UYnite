<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Department;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;

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
        if (app()->isProduction()) {
            URL::forceScheme('https');
        }

        // View::composer(['components.leftSideBar', 'components.navbar'], function ($view) {
        //     if (Schema::hasTable('departments')) {
        //         $view->with('departments', Department::all());
        //     } else {
        //         $view->with('departments', collect());
        //     }
        // });
    }
}
