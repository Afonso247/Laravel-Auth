
<div class="conteudo">

    <div class="search-container">
        <h2>Busque um artigo: </h2>
        <form action="/dashboard" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Buscar por título...">
            <x-jet-button type="submit">
                {{ __('Pesquisar') }}
            </x-jet-button>
        </form>
    </div>

    <x-jet-section-border />

    @if($search)
    <h2>Buscando por: <strong style="color: #3E6D9C;">{{ $search }}</strong></h2>
    @else
    <h2>Mostrando últimos artigos: </h2>
    @endif


    <hr>

    
    <div>
        @foreach ($articles as $article)
            
            <h3><strong>{{ $article->title }}</strong></h3>
            <h4><i>{{ $article->resume }}</i></h4>
            <p>{{ $article->text }}</p>
            <x-jet-section-border />
        @endforeach
        @if($search)
        <p><a href="/dashboard" style="text-decoration: underline; color: #3E6D9C;">Ver todos os artigos</a></p>
        @elseif(count($articles) == 0 && $search)
        <h3><strong>Não há artigos disponíveis com a busca.</strong></h3>
        <p><a href="/dashboard" style="text-decoration: underline; color: #3E6D9C;">Ver todos os artigos</a></p>
        @elseif(count($articles) == 0)
        <h3><strong>Não há artigos disponíveis.</strong></h3>
        @endif
    </div>

    <div>
        {{ $articles->links() }}
    </div>
</div>