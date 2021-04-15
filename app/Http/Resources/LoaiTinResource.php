<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoaiTinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'loaitin';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'theloai_id' => $this->idTheLoai,
            'Ten' => $this->Ten,
            'TenKhongDau' => $this->TenKhongDau,
           
        ];
    }
}
