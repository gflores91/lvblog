@forelse ($noticias as $noticia)
    <div class="col-sm-6">
        <div class="card mb-3">
            <img class="card-img-top" src="{{ $noticia->imagen }}" alt="Card image cap">
            <div class="card-body">
                <p class="text-muted">
                        @lang('app.Posted') <a href="{{ route('user.index', $noticia->user->username) }}">{{ $noticia->user->username }}</a>
                </p>
                <h5 class="card-title">{{ $noticia->titulo }}</h5>
                <p class="card-text">{{ $noticia->cuerpo }}</p>
                <p class="card-text">
                    <small class="text-muted">@lang('app.Date_post') {{ $noticia->created_at }}</small>
                </p>
                <p class="float-right">
                    <a href="{{ route('noticia.detalle', $noticia->id) }}" class="text-right">@lang('app.Read_more')</a>
                </p>
            </div>
        </div>
    </div>
    @empty
    <div class="col-sm-12">
        <p>@lang('app.No_news')</p>
    </div>
    @endforelse

    @if(count($noticias))
    <div class="mx-auto">
        {{ $noticias->links() }}
    </div>
    @endif
