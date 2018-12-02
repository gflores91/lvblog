<?php

namespace lvblog\Http\Controllers;

use Illuminate\Http\Request;

use lvblog\Models\Noticia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
                ->except('Index', 'Locale');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        $noticias = Noticia::with('user')->latest()->paginate(10);

        return view('home.index', [
            'noticias' => $noticias
        ]);
    }

    public function Locale(Request $request)
    {
        session()->put('locale', $request->input('lang'));

        return back();
    }

}
