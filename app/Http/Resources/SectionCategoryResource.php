<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'section_category';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'section' => $this->section_id
        ];
    }
}
