<div>
    <p>Mostrar Artigos</p>
    <p>{{ $message }}</p>

    <input type="text" name="message" id="message" wire:model="message">

    <hr>

    @foreach ($articles as $article)
        <p>{{ $article->slug }} - {{ $article->text }} {{ $article->uuid }}</p>
    @endforeach

    @foreach ($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach
</div>
