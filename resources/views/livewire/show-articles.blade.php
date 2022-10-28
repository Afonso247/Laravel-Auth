<div>
    <p>Mostrar Artigos</p>
    <p>{{ $message }}</p>

    <input type="text" name="message" id="message" wire:model="message">

    <hr>

    @foreach ($articles as $article)
        <p>{{ $article->user_id }} - {{ $article->text }}</p>
    @endforeach
</div>
