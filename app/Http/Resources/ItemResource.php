<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static $wrap = 'item';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'title_vn' => $this->title_vn,
            'video' => $this->video,
            'image' => $this->image,
            'tour360' => $this->tour360,
            'scan' => $this->scan,
            'detail' => $this->detail,
            'detail_vn' => $this->detail_vn,
          
        ];
    }
}
