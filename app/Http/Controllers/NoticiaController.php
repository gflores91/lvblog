<?php

namespace lvblog\Http\Controllers;

use Illuminate\Http\Request;

use lvblog\Models\Noticia;

class NoticiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
        ->except('Detalle');
    }
    //
    public function Index()
    {
        $noticias = Noticia::paginate(10);

        return view('noticia.index', [
            'noticias' => $noticias
        ]);
    }

    public function Crear()
    {
        return view('noticia.crear');
    }

    public function CrearPost(Request $request)
    {
        $noticia = Noticia::create($request->all());
        $noticia->save();

        return redirect()->back();
    }

    public function Detalle($id)
    {
        $noticia = Noticia::findOrFail($id);

        return view('noticia.detalle', [
            'noticia' => $noticia
        ]);
    }
}
