<?php

namespace lvblog\Http\Controllers;

use Illuminate\Http\Request;

use lvblog\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function Index($username)
    {
        $user = User::where('username', $username)->first();
        $noticias = $user->noticias()->paginate(10);

        return view('user.index', [
            'user' => $user,
            'noticias' => $noticias,
        ]);
    }
}
