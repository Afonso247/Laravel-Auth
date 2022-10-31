<div>
    <p>Mostrando últimos artigos</p>

    <input type="text" name="message" id="message" wire:model="message">

    <hr>

    
    <div>
        @foreach ($articles as $article)
            @if(auth()->user()->id == $article->user_id)
            <p>{{ $article->title }} {{ $article->resume }} - {{ $article->text }}</p>
            <hr>
            @endif
        @endforeach
    </div>

    <div>
        {{  $articles->links() }}
    </div>

</div>
