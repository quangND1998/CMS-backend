<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'user';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' =>$this->name,
            'email' => $this->email,
            // 'password' =>$this->password,
            // 'password_again' =>$this->password,
            'account_type' =>$this->quyen,
            'created_at' => $this->created_at
        ];
    }
}
