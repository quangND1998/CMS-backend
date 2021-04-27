<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Scan3dResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'scan3d';
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'favicon' => $this->favicon,
            'model_code' => $this->model_code,
            'slug' => $this->slug,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('200', 'successfully');
    }
}