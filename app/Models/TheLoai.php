<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiTin;
use App\Models\TinTuc;

class TheLoai extends Model
{
    use HasFactory;
    protected $table = "theloai";

    public function LoaiTin()
    {
        return $this->hasMany(LoaiTin::class, 'idTheLoai', 'id');
    }

    public function TinTuc()
    {
        return $this->hasManyThrough(TinTuc::class, LoaiTin::class, 'idTheLoai', 'idLoaiTin', 'id');
    }

    public function Delete()
    {
        $this->TinTuc()->delete(); // Vì có ràng buộc khóa ngoại nên phải xóa dữ liệu có khóa ngoại trước

        $this->LoaiTin()->delete();

        return parent::delete();
    }
}
