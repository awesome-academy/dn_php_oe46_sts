<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repository\Course\CourseRepositoryInterface::class,
            \App\Repository\Course\CourseRepository::class,
            \App\Repository\Course\UserRepositoryInterface::class,
            \App\Repository\Course\UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'user' => User::class,
        ]);
        Paginator::useBootstrap();
    }
}
