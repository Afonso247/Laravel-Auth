@section('web-title', 'Criar novo artigo')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <strong style="color: #3E6D9C;">Criar</strong>{{ __(' novo artigo.') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="conteudo">
                    <form class="form-body" wire:submit.prevent="create" method="POST" autocomplete="off">
                        @csrf
                            <label for="">Título</label>
                            <input type="text" name="title" id="title" placeholder="Min. 3 caracteres..." wire:model="title" minlength="3" maxlength="70">
                            <label for="">Resumo do Artigo</label>
                            <input type="text" name="resume" id="resume" placeholder="Min. 10 caracteres..." wire:model="resume" minlength="10" maxlength="100">
                            <label for="">Texto</label>
                            <textarea name="text" id="text" cols="30" rows="10" placeholder="Max. 250 caracteres..." wire:model="text" maxlength="250"></textarea>
                
                        <x-jet-button class="btn" type="submit">
                            {{ __('Criar Novo Artigo') }}
                        </x-jet-button>
                    </form>
            </div>

            @error('title')
            <p>O campo "Título" não foi devidamente preenchido.</p>
            <small>(Min. 10 caracteres | Max. 70 caracteres)</small>
            <small>- O título não pode ser igual a de outros artigos</small>
            @enderror
            @error('resume')
            <p>O campo "Resumo do Artigo" não foi devidamente preenchido.</p>
            <small>(Min. 20 caracteres | Max. 100 caracteres)</small>
            @enderror
            @error('text')
            <p>O campo "Texto" não foi devidamente preenchido.</p>
            <small>(Max. 250 caracteres)</small>
            @enderror
        </div>
    </div>
</div>
