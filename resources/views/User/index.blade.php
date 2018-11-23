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
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mt-2 text-center">
        <div class="thumbnail">
            <img src="{{ $user->avatar }}" alt="">
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                    <p>
                        <strong>Nombre: </strong>
                        {{ $user->name }}
                    </p>
                    <p>
                        <strong>Email: </strong>
                        {{ $user->email }}
                    </p>
                </p>
                <form action="{{ route($isFollowing ? 'user.unfollowpost' : 'user.followpost', $user->username) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary float-right">
                        {{ $isFollowing ? 'No seguir' : 'Seguir' }}
                    </button>
                </form>
            </div>
        </div>
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
                <div class="row mt-2">
                    @forelse ($user->followers as $seguidor)
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                        <div class="thumbnail">
                            <img src="{{ $seguidor->avatar }}" alt="">
                            <div class="caption">
                                <p>
                                    <a href="{{ route('user.index', $seguidor->username) }}">{{ '@'.
                                        $seguidor->username }}</a>
                                </p>
                                <!-- <p>
                                    <a href="#" class="btn btn-primary">Action</a>
                                    <a href="#" class="btn btn-default">Action</a>
                                </p> -->
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>
                        El usuario no tiene seguidores
                    </p>
                    @endforelse
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row mt-2">
                    @forelse ($user->follows as $siguiendo)
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                        <div class="thumbnail">
                            <img src="{{ $siguiendo->avatar }}" alt="">
                            <div class="caption">
                                <p>
                                    <a href="{{ route('user.index', $siguiendo->username) }}">{{ '@'.
                                        $siguiendo->username }}</a>
                                </p>
                                <!-- <p>
                                        <a href="#" class="btn btn-primary">Action</a>
                                        <a href="#" class="btn btn-default">Action</a>
                                    </p> -->
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>
                        El usuario no tiene seguidores
                    </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
