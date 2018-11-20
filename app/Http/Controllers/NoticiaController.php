<?php

namespace lvblog\Http\Controllers;

use Illuminate\Http\Request;

use lvblog\Models\Noticia;

class NoticiaController extends Controller
{
    //
    public function Crear()
    {
        return view('noticia.crear');
    }

    public function Detalle($id)
    {
        $noticia = Noticia::findOrFail($id);

        return view('noticia.detalle', [
            'noticia' => $noticia
        ]);
    }

    public function CrearPost(Request $request)
    {
        $noticia = Noticia::create($request->all());
        $noticia->save();

        return redirect()->back();
    }
}
