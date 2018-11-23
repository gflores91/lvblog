@extends('layouts.master')


@section('content')

<div class="row">
    <div class="col-md-12 mt-2">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Bienvenido a {{ env('APP_NAME') }}</h1>
                <p class="lead">Este sitio tiene fines educativos para el aprendizaje personal del desarrollo en
                    Laravel framework.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Lista de noticias</h1>
        </div>
    </div>
</div>
<hr>

<div class="row">
    @forelse ($noticias as $noticia)
    <div class="col-sm-6">
        <div class="card mb-3">
            <img class="card-img-top" src="{{ $noticia->imagen }}" alt="Card image cap">
            <div class="card-body">
                <p class="text-muted">
                    Posteado por: <a href="{{ route('user.index', $noticia->user->username) }}">{{ $noticia->user->username }}</a>
                </p>
                <h5 class="card-title">{{ $noticia->titulo }}</h5>
                <p class="card-text">{{ $noticia->cuerpo }}</p>
                <p class="card-text">
                    <small class="text-muted">Posteado el: {{ $noticia->created_at }}</small>
                </p>
                <p class="float-right">
                    <a href="{{ route('noticia.detalle', $noticia->id) }}" class="text-right">Leer más</a>
                </p>
            </div>
        </div>
    </div>
    @empty
    <div class="col-sm-12">
        <p>No hay noticias registradas</p>
    </div>
    @endforelse

    @if(count($noticias))
    <div class="mx-auto">
        {{ $noticias->links() }}
    </div>
    @endif
</div>

@endsection
