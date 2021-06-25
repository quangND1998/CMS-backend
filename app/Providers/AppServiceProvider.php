<?php

namespace App\Providers;

use App\Models\Content;
use App\Observers\PageObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Page;
use App\Models\Section;
use App\Models\Theme;
use App\Observers\ContentObserver;
use App\Observers\SectionObserver;
use App\Observers\ThemeObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
 
    }
}
