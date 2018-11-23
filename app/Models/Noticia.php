<?php

namespace lvblog\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo',
        'cuerpo',
        'imagen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
