<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SectionResource;
use Illuminate\Support\Facades\Crypt;
class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'page';
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'name' => $this->name,
            'name_vn' =>$this->name_vn,
            'description' =>  $this->description,
            'image' => $this->image,
        ];
    }
    public function withResponse($request, $response)
    {
        $response->header('200', 'successfully');
    }
}
