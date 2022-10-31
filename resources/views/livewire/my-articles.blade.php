@section('web-title', 'Meus artigos')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Meus artigos') }}.
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            {{-- <x-jet-welcome /> --}}
            <div>
                <p>Mostrando últimos artigos de {{ Auth::user()->name }}.</p>
            
                <input type="text" name="message" id="message" wire:model="message">
            
                <hr>
            
                
                <div>
                    @foreach ($articles as $article)
                        @if(auth()->user()->id == $article->user_id)
                        {{-- <p>{{ $article->title }} {{ $article->resume }} - {{ $article->text }}</p> --}}
                        <h3><strong>{{ $article->title }}</strong></h3>
                        <h4><i>{{ $article->resume }}</i></h4>
                        <p>{{ $article->text }}</p>
                        <a href="#">Atualizar artigo</a>
                        <a href="#">Remover artigo</a>
                        <hr>
                        @endif
                    @endforeach
                </div>
            
                <div>
                    {{  $articles->links() }}
                </div>
            
            </div>
        </div>
    </div>
</div>
