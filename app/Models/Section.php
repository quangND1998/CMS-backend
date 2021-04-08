<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'section';
    protected $fillable = ['id', 'title', 'text', 'sub_title', 'template_id'];
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    public function contents()
    {
        return $this->hasMany(Content::class, 'section_id');
    }
    public function theme()
    {
        return $this->hasOne(Theme::class, 'section_id');
    }
    public function section_category()
    {
        return $this->hasMany(Section_Category::class, 'section_id');
    }
}
