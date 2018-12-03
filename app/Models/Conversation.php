<?php

namespace lvblog\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    public function privateMessages()
    {
        return $this->hasMany(PrivateMessage::class)->orderby('created_at', 'desc');
    }

    public static function between(User $user, User $otheruser)
    {
        $query = Conversation::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereHas('users', function ($query) use ($otheruser){
            $query->where('user_id', $otheruser->id);
        });

        $conversacion = $query->firstOrCreate([]);

        $conversacion->users()->sync([
            $user->id, $otheruser->id
        ]);

        return $conversacion;
    }

}
