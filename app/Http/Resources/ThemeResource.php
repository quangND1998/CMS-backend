<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThemeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'theme';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image_template' => $this->image_template,
            'link_code' => $this->link_code,
            'type' => $this->type
          
        ];
    }
}
