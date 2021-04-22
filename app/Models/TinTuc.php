<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table = "tintuc";

    public function LoaiTin()
    {
        return $this->belongsTo(LoaiTIn::class, 'idLoaiTin', 'id');
    }

    public function Comment()
    {
        return $this->hasMany(Comment::class, 'idTinTuc', 'id');
    }
}
