@extends('Layouts.master')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>{{ $noticia->titulo }}</h1>
        </div>
    </div>
</div>

<hr>

<div class="row container">
    <div class="col-md-12 text-center">
        <p>
            <img src="{{ $noticia->imagen }}" class="img-thumbnail" alt="">

        </p>
        <p>
            {{ $noticia->cuerpo }}
        </p>
    </div>
</div>
@endsection
