<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StyleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'style';
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'color' => $this->color,
            'background_color' => $this->background_color,
            'font_size' => $this->font_size,
            'page_id' => $this->page_id
        ];
    }
}
