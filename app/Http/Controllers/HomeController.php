<?php

namespace lvblog\Http\Controllers;

use Illuminate\Http\Request;

use lvblog\Models\Noticia;

class HomeController extends Controller
{
    //
    public function Index()
    {
        $noticias = Noticia::paginate(10);

        return view('home.index', [
            'noticias' => $noticias
        ]);
    }
}
