<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Option;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $site_info = Option::getOptions();
        View::share('site_info', $site_info);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            '\App\Repositories\RepositoryInterface',
            '\App\Repositories\EloquentRepository',
            '\App\Repositories\UserRepository'
        );
    }
}
