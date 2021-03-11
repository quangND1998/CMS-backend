<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'session';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'sub_title' => $this->sub_title,
            'template_id' => $this->template_id,
        ];
    }
    public function withResponse($request, $response)
    {
        $response->header('200', 'successfully');
    }
}
