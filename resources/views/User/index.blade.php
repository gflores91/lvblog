@extends('layouts.master')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Perfil de usuario <small>{{ $user->username }}</small></h1>
        </div>
    </div>
</div>
<hr>


<div class="row">
    <div class="col-md-12">
        <p>
            <strong>Nombre: </strong>
            {{ $user->name }}
        </p>
        <p>
            <strong>Email: </strong>
            {{ $user->email }}
        </p>
        <p>
            <strong>Username: </strong>
            {{ $user->username }}
        </p>
        <p>
            <strong>Avatar: </strong>
            {{ $user->avatar }}
        </p>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">Noticias</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Seguidores</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false">Siguiendo</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row mt-2">
                    @forelse ($noticias as $noticia)
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <img class="card-img-top" src="{{ $noticia->imagen }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="text-muted">
                                    Posteado por: <a href="#">{{ $noticia->user->username }}</a>
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
                    <p>
                        El usuario no ha creado noticias
                    </p>
                    @endforelse

                    @if(count($noticias))
                    <div class="mx-auto">
                        {{ $noticias->links() }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                ...
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                ...
            </div>
        </div>
    </div>
</div>




@endsection
