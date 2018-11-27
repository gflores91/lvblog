<?php

namespace lvblog\Http\Controllers;

use Illuminate\Http\Request;

use lvblog\Models\Noticia;
use lvblog\Models\User;

class NoticiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->except('Detalle', 'Buscar');
    }
    //
    public function Index()
    {
        $noticias = User::find(auth()->user()->id)
                            ->noticias()->latest()->paginate(10);

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
        $imagen = $request->file('imagen');

        $noticia = Noticia::create([
            'user_id' => $request->user()->id,
            'titulo' => $request->titulo,
            'cuerpo' => $request->cuerpo,
            'imagen' => $imagen->store('noticias', 'public'),

        ]);

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

    public function Buscar(Request $request)
    {
        $noticias = Noticia::with('user')
                            ->where('cuerpo', 'Like', '%'. $request->input('query') .'%')
                            ->paginate(10);

        return view('noticia.buscar', [
            'noticias' => $noticias,
        ]);
    }
}
