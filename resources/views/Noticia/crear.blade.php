@extends('Layouts.master')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Crear noticia</h1>
        </div>
    </div>
</div>

<hr>

<div class="row container">
    <div class="col-md-12">
        <form action="{{ route('noticia.crearpost') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="titulo" class="col-sm-4 col-form-label">Titulo de la noticia</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingrese un titulo">
                </div>
            </div>
            <div class="form-group row">
                <label for="cuerpo" class="col-sm-4 col-form-label">Cuerpo de la noticia</label>
                <div class="col-sm-8">
                    <textarea name="cuerpo" id="cuerpo" class="form-control" rows="3" required="required">
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="imagen" class="col-sm-4 col-form-label">Imagen de la noticia</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="imagen" id="imagen" placeholder="Ingrese url de la imagen">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-4 col-md-3">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
