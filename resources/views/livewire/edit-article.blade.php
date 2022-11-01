@section('web-title', 'Editando artigo...')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <strong style="color: #3E6D9C;">Editando</strong>{{ __(' artigo...') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form action="/articles/update/{{ $article->id }}" method="POST">
                @csrf
                @method('PUT')
                <label for="">Título</label>
                <input type="text" name="title" id="title" placeholder="Min. 30 caracteres..." wire:model="title" value="{{ $article->title }}">
                <label for="">Resumo do Artigo</label>
                <input type="text" name="resume" id="resume" placeholder="Min. 50 caracteres..." wire:model="resume" value="{{ $article->resume }}">
                <label for="">Texto</label>
                <textarea name="text" id="text" cols="50" rows="20" placeholder="Max. 200 caracteres" wire:model="text">{{ $article->text }}</textarea>
        
                <x-jet-button type="submit">
                    {{ __('Criar Novo Artigo') }}
                </x-jet-button>
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
    </div>
</div>
