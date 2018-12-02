@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12 mt-2">
        <div class="page-header">
            <h1>@lang('app.Title_news')</h1>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12 mt-2">
        <p>
            <a href="{{ route('noticia.crear') }}">@lang('app.Create_news')</a>
        </p>
    </div>
</div>


<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table table striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('app.Name')</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($noticias as $noticia)
                <tr>
                    <td scope="row">{{ $noticia->id }}</td>
                    <td> {{ $noticia->titulo }} </td>
                    <td>
                        <a href="#">@lang('app.Edit')</a> |
                        <a href="{{ route('noticia.detalle', $noticia->id) }}">@lang('app.Details')</a> |
                        <a href="#">@lang('app.Delete')</a>
                    </td>
                </tr>
                @empty
                    <p>@lang('app.Empty')</p>
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
