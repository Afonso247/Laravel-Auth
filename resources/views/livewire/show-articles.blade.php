<div>
    <p>Mostrando últimos artigos</p>

    <input type="text" name="message" id="message" wire:model="message">

    <hr>

    @foreach ($articles as $article)
        <p>{{ $article->slug }} - {{ $article->text }} - {{ $article->user_id }}</p>
    @endforeach

    <hr>

    <div>
        {{ $articles->links() }}
    </div>
</div>