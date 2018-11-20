@extends('Layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12 mt-2">
        <div class="page-header">
            <h1>Listado de noticias</h1>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12 mt-2">
        <p>
            <a href="{{ route('noticia.crear') }}">Crear nueva noticia</a>
        </p>
    </div>
</div>


<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table table striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($noticias as $noticia)
                <tr>
                    <td scope="row">{{ $noticia->id }}</td>
                    <td> {{ $noticia->titulo }} </td>
                    <td>
                        <a href="#">Editar</a> |
                        <a href="{{ route('noticia.detalle', $noticia->id) }}">Detalle</a> |
                        <a href="#">Eliminar</a>
                    </td>
                </tr>
                @empty
                    <p>No existen registros</p>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(count($noticias))
    <div class="mx-auto">
        {{ $noticias->links() }}
    </div>
    @endif
</div>


@endsection
