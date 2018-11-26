<?php

namespace lvblog\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo',
        'cuerpo',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImagenAttribute($imagen)
    {
        if (!$imagen || starts_with($imagen, 'http')) {
            return $imagen;
        }

        return \Storage::disk('public')->url($imagen);
    }
}
