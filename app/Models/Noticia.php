<?php

namespace lvblog\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo', 'cuerpo', 'imagen',
    ];
}
