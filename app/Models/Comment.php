<?php

namespace lvblog\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function noticia()
    {
        return $this->belongsTo(Noticia::class);
    }
}
