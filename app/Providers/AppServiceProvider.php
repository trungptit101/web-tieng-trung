<?php

namespace App\Providers;

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
        view()->composer('client.layouts.header', function ($view) {
            $banners = \DB::table('banners')
                ->select('id', 'image')
                ->get();

            $view->with([
                'banners' => $banners,
            ]);
        });

        view()->composer('client.layouts.footer', function ($view) {
            $footers = \DB::table('layouts_footer')
                ->get();

            $view->with([
                'footers' => $footers,
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
