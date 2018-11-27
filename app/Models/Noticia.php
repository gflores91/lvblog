<?php

namespace lvblog\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Noticia extends Model
{
    use Searchable;

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

    public function searchableAs()
    {
        return 'noticias_index';
    }

    public function toSearchableArray()
    {
        return array_merge($this->toArray(), [
            'user' => $this->user
        ]);
    }
}
