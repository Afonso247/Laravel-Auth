<div>
    <p>Mostrando últimos artigos</p>

    <input type="text" name="message" id="message" wire:model="message">

    <hr>

    
    <div>
        @foreach ($articles as $article)
            <p>{{ $article->title }} {{ $article->resume }} - {{ $article->text }}</p>
            <hr>
        @endforeach
    </div>

    <hr>

    <div>
        {{ $articles->links() }}
    </div>
</div>