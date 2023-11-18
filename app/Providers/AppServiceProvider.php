<?php

namespace App\Providers;

use App\Core\Adapters\Theme;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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

        Schema::defaultStringLength(191);


        $theme = theme();

        // Share theme adapter class
        View::share('theme', $theme);

        $theme->initConfig();

        bootstrap()->run();

        if (isRTL()) {
            // RTL html attributes
            Theme::addHtmlAttribute('html', 'dir', 'rtl');
            Theme::addHtmlAttribute('html', 'direction', 'rtl');
            Theme::addHtmlAttribute('html', 'style', 'direction:rtl;');
            Theme::addHtmlAttribute('body', 'direction', 'rtl');
        };


    }
}
