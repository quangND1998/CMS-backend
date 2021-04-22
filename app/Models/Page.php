<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'page';
    protected $fillable = ['id', 'name','name_vn', 'image', 'description'];
    public function section()
    {
        return $this->hasMany(Section::class, 'page_id');
    }
    public function style()
    {
        return $this->hasOne(Style::class, 'page_id');
    }
}
