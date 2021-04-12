<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TinTuc;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comment";

    public function TinTuc()
    {
        return $this->belongsTo(TinTuc::class, 'idTinTuc', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
