@section('web-title', 'Meus artigos')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if($counter == 1)
        {{ __('Visualize, atualize e remova o seu ') }} <strong style="color: #3E6D9C">{{ __('artigo.') }}</strong>
        @elseif($counter > 0)
        {{ __('Visualize, atualize e remova os seus ') }} <strong style="color: #3E6D9C">{{ $counter }} {{ __(' artigos.') }}</strong>
        @else
        {{ __('Você não possui artigos.') }} <a href="/articles/create" style="color: #3E6D9C;"><strong>Crie um agora!</strong></a>
        @endif
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            {{-- <x-jet-welcome /> --}}
            <div>
                <p>Mostrando últimos artigos de {{ Auth::user()->name }}: </p>

            
                <hr>
            
                
                <div>
                    @if(count(auth()->user()->articles) > 0)
                    @foreach ($articles as $article)
                        @if(auth()->user()->id == $article->user_id)
                        <h3><strong>{{ $article->title }}</strong></h3>
                        <h4><i>{{ $article->resume }}</i></h4>
                        <p>{{ $article->text }}</p>
                        <x-jet-secondary-button wire:click="showModal({{ $article->id }})" wire:loading.attr="disabled">
                            Editar Artigo
                            {{-- <a href="/articles/edit/{{ $article->id }}" style="color: blue;">Atualizar artigo</a> --}}
                        </x-jet-secondary-button>
                        <form action="/articles/delete/{{ $article->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-jet-danger-button type="submit" wire:loading.attr="disabled">
                                {{ __('Remover Artigo') }}
                            </x-jet-danger-button>
                        </form>
                        @endif
                        <x-jet-section-border />

                    @endforeach
                    <x-jet-dialog-modal wire:model="editModal">
                        <x-slot name="title">
                            {{ __('Editar Artigo') }}
                        </x-slot>
            
                        <x-slot name="content">
                            {{-- <div>Troço bão</div> --}}
                            {{-- <livewire:edit-article :article="$artigo"> --}}
                            @livewire('edit-article', ['articleId' => $articleId])
                        </x-slot>
            
                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="hideModal" wire:loading.attr="disabled">
                                {{ __('Cancelar') }}
                            </x-jet-secondary-button>
                        </x-slot>
                    </x-jet-dialog-modal>
                    @else 
                        <p>Não há artigos no momento</p>
                    @endif
                </div>
            
                <div>
                    {{  $articles->links() }}
                </div>
            
            </div>
        </div>
    </div>
</div>
