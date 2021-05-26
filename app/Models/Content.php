<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';
    protected $fillable = ['id', 'title', 'video', 'image', 'subtitle', 'short_content', 'detail','detail_vn','video_upload','icon_class', 'session_id','section_category_id'];
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function section_category()
    {
        return $this->belongsTo(section_category::class);
    }
}
