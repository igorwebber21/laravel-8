<?php

namespace App\Providers;

use App\Contracts\Video\VideoHosting;
use App\Services\Video\Vimeo;
use App\Services\Video\Youtube;
use Illuminate\Support\Facades\Schema;
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
        $this->app->bind(VideoHosting::class, function($app){ // singleton
            return new Youtube();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //
    }
}
