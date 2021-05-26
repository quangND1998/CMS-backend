<?php

namespace App\Observers;

use App\Models\Content;
use Illuminate\Support\Facades\Cache;
class ContentObserver
{
    /**
     * Handle the Content "created" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function created(Content $content)
    {
        if($content->section){
            Cache::forget("item.{$content->section->id}");
        }
       
        if($content->section_category != null){
            Cache::forget("item_category.{$content->section_category_id}");
        } 
    }

    /**
     * Handle the Content "updated" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function updated(Content $content)
    {
        if($content->section){
            Cache::forget("item.{$content->section->id}");
        }
       
        if($content->section_category != null){
            Cache::forget("item_category.{$content->section_category_id}");
        } 
    }

    /**
     * Handle the Content "deleted" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function deleted(Content $content)
    {
        if($content->section){
            Cache::forget("item.{$content->section->id}");
        }
       
        if($content->section_category != null){
            Cache::forget("item_category.{$content->section_category_id}");
        } 
    }

    /**
     * Handle the Content "restored" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function restored(Content $content)
    {
        if($content->section){
            Cache::forget("item.{$content->section->id}");
        }
       
        if($content->section_category != null){
            Cache::forget("item_category.{$content->section_category_id}");
        } 
    }

    /**
     * Handle the Content "force deleted" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function forceDeleted(Content $content)
    {
        if($content->section){
            Cache::forget("item.{$content->section->id}");
        }
       
        if($content->section_category != null){
            Cache::forget("item_category.{$content->section_category_id}");
        } 
    }
}
