<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'slide';
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'slide_name' => $this->Ten,
            'slide_content' =>$this->NoiDung,
            'slide_url' =>$this->link,
            'slide_img' =>$this->Hinh

        ];
    }
}
