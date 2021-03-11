<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';
    protected $fillable = ['id', 'title', 'video', 'image', 'subtitle', 'short_content', 'detail', 'icon', 'session_id'];
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
