<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $table = 'theme';
    protected $fillable = ['id', 'title', 'link_code', 'description', 'section_id'];
    public function section()
    {
        return $this->hasMany(Section::class,'theme_id');
    }
}
