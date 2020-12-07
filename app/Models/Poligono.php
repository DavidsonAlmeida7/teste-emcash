<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poligono extends Model
{
    protected $table = 'poligono';

    protected $fillable = [
        'base',
        'altura'
    ];
}
