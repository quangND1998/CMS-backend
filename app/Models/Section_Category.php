<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section_Category extends Model
{
    use HasFactory;
    protected $table = 'section_category';
    public function contents()
    {
        return $this->hasMany(Content::class, 'section_category_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
