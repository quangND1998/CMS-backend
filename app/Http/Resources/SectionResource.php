<?php

namespace App\Http\Resources;

use App\Models\Theme;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'section';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'title_vn' => $this->title_vn,
            'text_vn' => $this->text_vn,
            'sub_title' => $this->sub_title,
            'sub_title_vn' =>  $this->sub_title_vn,
            'number' => $this->number,
            'theme_id' => $this->theme_id,
            'theme' => new ThemeResource($this->whenLoaded('theme',$this->theme))
        ];
    }
    public function withResponse($request, $response)
    {
        $response->header('200', 'successfully');
    }
}
