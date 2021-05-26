<?php

namespace App\Observers;

use App\Models\Section;
use Illuminate\Support\Facades\Cache;
class SectionObserver
{
    /**
     * Handle the Section "created" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function created(Section $section)
    {
        Cache::forget("item.{$section->id}");
        if($section->page != null){
            Cache::forget("section.{$section->page->id}");
        }
        
    }

    /**
     * Handle the Section "updated" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function updated(Section $section)
    {
        Cache::forget("item.{$section->id}");
        if($section->page != null){
            Cache::forget("section.{$section->page->id}");
        }
        
    }

    /**
     * Handle the Section "deleted" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function deleted(Section $section)
    {
        Cache::forget("item.{$section->id}");
        if($section->page != null){
            Cache::forget("section.{$section->page->id}");
        }
        
    }

    /**
     * Handle the Section "restored" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function restored(Section $section)
    {
        Cache::forget("item.{$section->id}");
        if($section->page != null){
            Cache::forget("section.{$section->page->id}");
        }
        
    }

    /**
     * Handle the Section "force deleted" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function forceDeleted(Section $section)
    {
        Cache::forget("item.{$section->id}");
        if($section->page != null){
            Cache::forget("section.{$section->page->id}");
        }
        
    }
}
