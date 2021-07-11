<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biserial extends Model
{

    protected $fillable = ['A', 'B'];
    public $timestamps = false;    
    use HasFactory;
}
