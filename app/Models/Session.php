<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'session';
    protected $fillable = ['id', 'name', 'text' ,'template_id'];
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
    public function contents(){
        return $this->hasMany(Content::class,'session_id');
    }
}
