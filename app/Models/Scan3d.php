<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scan3d extends Model
{
    use HasFactory;
    protected $table = 'scan3d';
    protected $fillable = ['id', 'name', 'favicon', 'title', 'model_code', 'slug'];
}