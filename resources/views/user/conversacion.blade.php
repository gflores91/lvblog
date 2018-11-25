@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Conversación con:
                <small>
                    {{ '@' . $conversacion->users->except($user->id)->implode('username', ', ') }}
                </small>
            </h1>
        </div>
    </div>
    @foreach($conversacion->privateMessages as $mensaje)
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header">
                {{ '@'. $mensaje->user->username }}:
            </div>
            <div class="card-body">
                <p class="card-text">{{ $mensaje->message }}</p>
            </div>
            <div class="card-footer text-muted text-right">
                Enviado: {{ $mensaje->created_at }}
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
