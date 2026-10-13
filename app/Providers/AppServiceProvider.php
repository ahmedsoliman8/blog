<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        View::composer(['theme.partials.header','theme.blogs.create', 'theme.partials.sidebar'], function ($view) {
            $categories = Category::get();
            $categoriesCount = $categories->count();
            $view->with(['categories'=> $categories ,'categoriesCount' => $categoriesCount]);
        });
        Paginator::useBootstrapFive();
    }
}
