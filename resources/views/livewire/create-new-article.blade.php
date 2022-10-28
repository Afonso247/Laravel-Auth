<div>
    <form wire:submit.prevent="create" method="POST">
        <label for="">Título</label>
        <input type="text" name="title" id="title" placeholder="Escreva algo memorável..." wire:model="title">
        <label for="">Resumo</label>
        <input type="text" name="resume" id="resume" placeholder="Do que se trata o seu artigo?" wire:model="resume">
        <label for="">Texto</label>
        <input type="text" name="text" id="text" placeholder="Escreva sobre o seu artigo..." wire:model="text">
        <label for="">Slug</label>
        <input type="text" name="slug" id="slug" wire:model="slug">

        <button type="submit">Criar Artigo</button>
    </form>
    <p>Testando...</p>
</div>
