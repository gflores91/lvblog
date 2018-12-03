@extends('layouts.master')

@section('content')
<div class="row mt-2">
    <div class="col-md-12">
        <div class="page-header">
          <h1>@lang('app.Search_title')</h1>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="offset-md-8 col-md-4">
        <form class="form-inline" action="{{ route('noticia.buscar') }}">
            <div class="form-group">
                <input type="text" name="query" id="query" class="form-control" placeholder="@lang('app.Search')" aria-describedby="helpId" value="{{ old('query') }}">
                <button type="submit" class="btn btn-outline-primary">@lang('app.Search_button')</button>
            </div>
        </form>
    </div>
</div>

<div class="row mt-2">
    @include('noticia.noticia')
</div>
@endsection
