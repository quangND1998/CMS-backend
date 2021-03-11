<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;
    protected $table = 'style';
    protected $fillable = ['id', 'title', 'color', 'background_color', 'font_size', 'page_id'];
    public function section()
    {
        return $this->belongsTo(Page::class);
    }
}
