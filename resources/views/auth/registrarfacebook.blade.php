@extends('layouts.master')

@section('content')
<div class="row justify-content-center mt-2">
    <div class="col-md-12">

        <!-- <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <a href="#" class="thumbnail">
                <img src="{{ $user->avatar }}" alt="">
            </a>
        </div> -->
        
        <div class="card">
            <div class="card-header">Registro de usuario</div>
            
            <!-- <img src="{{ $user->avatar }}" class="img-thumbnail" alt=""> -->

            <div class="card-body">
                <form method="POST" action="{{ route('socialprofile.registrar') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name" value="{{ $user->name }}" required autofocus readonly>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email" value="{{ $user->email }}" required readonly>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Usuario</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> -->

                    <!-- <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Repita contraseña</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required>
                        </div>
                    </div> -->

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
