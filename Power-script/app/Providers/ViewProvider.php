<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Settings;
use App\Reviews;
use App\Ads;
use App\Terms;

class ViewProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials._userstats', function ($view) {
            $view->with('chartjs', User::Stats());
            $view->with('DR_chartjs', User::Stats());
            $view->with('m_chartjs', User::Stats());
            $view->with('mr_chartjs', User::Stats());
        });


        

        view()->composer('partials._terms', function ($view) {
            $view->with('terms', Terms::all());
        });

        view()->composer('includes.footer', function ($view) {
            $view->with('Settings', $Settings = Settings::orderBy('updated_at', 'desc')->first());
        });
        view()->composer('includes.reviews', function ($view) {
            $view->with('reviews', $reviews = Reviews::all());
        });


        view()->composer('partials._ads', function ($view) {
            $view->with('ads', $ads = Ads::inRandomOrder()->first());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
