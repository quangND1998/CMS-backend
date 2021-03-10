<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $table = 'template';
    protected $fillable = ['id', 'name'];
    public function session()
    {
        return $this->hasMany(Session::class, 'template_id');
    }
}
