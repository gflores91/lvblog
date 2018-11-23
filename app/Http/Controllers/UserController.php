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
        $isFollowing = auth()->user()->isFollowing($user);



        return view('user.index', [
            'user' => $user,
            'noticias' => $noticias,
            'isFollowing' => $isFollowing,
        ]);
    }

    public function FollowPost($username, Request $request)
    {
        $user = User::where('username', $username)->first();

        $yo = $request->user();

        $yo->follows()->attach($user);

        return redirect()->route('user.index', [
            'username' => $username,
        ]);
    }

    public function UnFollowPost($username, Request $request)
    {
        $user = User::where('username', $username)->first();

        $yo = $request->user();

        $yo->follows()->detach($user);

        return redirect()->route('user.index', [
            'username' => $username,
        ]);
    }
}
