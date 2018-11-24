<?php

namespace lvblog\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use lvblog\Models\User;
use lvblog\Models\SocialProfile;

class SocialProfileController extends Controller
{
    //
    public function Facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function Callback()
    {
        $user = Socialite::driver('facebook')->user();

        $userExisting = User::whereHas('socialProfiles', function ($query) use ($user){
            $query->where('social_id', $user->id);
        })->first();

        if($userExisting !== null)
        {
            auth()->login($userExisting);
            return redirect()->route('home.index');
        }

        session()->flash('facebookUser', $user);

        return view('auth.registrarfacebook', [
            'user' => $user,
        ]);
    }

    public function Registrar(Request $request)
    {
        $data = session('facebookUser');

        $username = $request->input('username');

        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'avatar' => $data->avatar,
            'username' => $username,
            'password' => str_random(16),
        ]);

        $profile = SocialProfile::create([
            'user_id' => $user->id,
            'social_id' => $data->id,
        ]);

        auth()->login($user);

        return redirect()->route('home.index');
    }
}
