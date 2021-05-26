<?php

namespace App\Observers;

use App\Models\Theme;
use Illuminate\Support\Facades\Cache;

class ThemeObserver
{
    /**
     * Handle the Theme "created" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function created(Theme $theme)
    {
        Cache::forget('themes');

    }

    /**
     * Handle the Theme "updated" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function updated(Theme $theme)
    {
        Cache::forget('themes');

    }

    /**
     * Handle the Theme "deleted" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function deleted(Theme $theme)
    {
        Cache::forget('themes');

    }

    /**
     * Handle the Theme "restored" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function restored(Theme $theme)
    {
        Cache::forget('themes');

    }

    /**
     * Handle the Theme "force deleted" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function forceDeleted(Theme $theme)
    {
        Cache::forget('themes');

    }
}
