<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static $wrap = 'item_catergory';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'video' => $this->video,
            'image' => $this->image,
            'subtitle' => $this->subtitle,
            'short_content' => $this->short_content,
            'detail' => $this->detail,
            'icon_image' => $this->icon_image,
            'icon_class' => $this->icon_class,
            'section_category' => $this->section_category_id
        ];
    }
}
