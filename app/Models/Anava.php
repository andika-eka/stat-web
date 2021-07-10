<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anava extends Model
{
    protected $fillable = ['x1', 'x2', 'x2'];
    public $timestamps = false;    
    use HasFactory;
}
