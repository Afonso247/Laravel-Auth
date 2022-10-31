<div>
    <p>Mostrando últimos artigos</p>

    <input type="text" name="message" id="message" wire:model="message">

    <hr>

    
    <div>
        @foreach ($articles as $article)
            {{-- <p>{{ $article->title }} {{ $article->resume }} - {{ $article->text }}</p> --}}
            <h3><strong>{{ $article->title }}</strong></h3>
            <h4><i>{{ $article->resume }}</i></h4>
            <p>{{ $article->text }}</p>
            <hr>
        @endforeach
    </div>

    <hr>

    <div>
        {{ $articles->links() }}
    </div>
</div>