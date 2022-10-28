<div>
    <form wire:submit.prevent="create" method="POST">
        <label for="">Título</label>
        <input type="text" name="title" id="title" placeholder="Min. 30 caracteres..." wire:model="title">
        <label for="">Resumo do Artigo</label>
        <input type="text" name="resume" id="resume" placeholder="Min. 50 caracteres..." wire:model="resume">
        <label for="">Texto</label>
        <textarea name="text" id="text" cols="50" rows="20" placeholder="Max. 200 caracteres" wire:model="text"></textarea>

        <button type="submit">Criar Artigo</button>
    </form>

    @error('title')
            <p>O campo "Título" não foi devidamente preenchido.</p>
            <small>(Min. 30 caracteres | Max. 70 caracteres)</small>
            <small>- O título não pode ser igual a de outros artigos</small>
    @enderror
    @error('resume')
            <p>O campo "Resumo do Artigo" não foi devidamente preenchido.</p>
            <small>(Min. 50 caracteres | Max. 100 caracteres)</small>
    @enderror
    @error('text')
        <p>O campo "Texto" não foi devidamente preenchido.</p>
        <small>(Max. 100 caracteres)</small>
    @enderror
</div>
