<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'contact';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'contact_name' => $this->name,
            'contact_email' => $this->email,
            'contact_message' => $this->content
        ];
    }
}
