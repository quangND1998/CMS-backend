<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TinTucResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'tintuc';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'TieuDe' => $this->TieuDe,
            'TieuDeKhongDau' => $this->TieuDeKhongDau,
            'TomTat' => $this->TomTat,
            'NoiDung' => $this->NoiDung,
            'TieuDe_en' => $this->TieuDe_en,
            'TieuDeKhongDau_en' => $this->TieuDeKhongDau_en,
            'TomTat_en' => $this->TomTat_en,
            'NoiDung_en' => $this->NoiDung_en,
            'Hinh' => $this->Hinh,
            'NoiBat' => $this->NoiBat,
            'SoLuotXem' => $this->SoLuotXem,
            'idLoaiTin' => $this->idLoaiTin,
            'created_at' => $this->created_at,

        ];
    }
}
