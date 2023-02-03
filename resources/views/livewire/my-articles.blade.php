@section('web-title', 'Meus artigos')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if($search)
        {{ __('Buscando por: ') }} <strong style="color: #3E6D9C;">{{ $search }}</strong>
        @elseif($counter == 1)
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
            <div class="conteudo">
                <p>Mostrando últimos artigos de {{ Auth::user()->name }}: </p>

            
                <hr>

                <div class="search-container">
                    <h2>Busque um artigo: </h2>
                    <form action="/articles/my-articles" method="GET">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Buscar por título...">
                        <x-jet-button type="submit">
                            {{ __('Pesquisar') }}
                        </x-jet-button>
                    </form>
                </div>

                <x-jet-section-border />
            
                
                <div>
                    @if(count(auth()->user()->articles) > 0)
                    @foreach ($articles as $article)
                        @if(auth()->user()->id == $article->user_id)
                        <h3><strong>{{ $article->title }}</strong></h3>
                        <h4><i>{{ $article->resume }}</i></h4>
                        <p>{{ $article->text }}</p>
                        <div class="btn-mystuff">
                            <div class="btn-mystuff-single">
                                <x-jet-secondary-button wire:click="showModal({{ $article->id }})" wire:loading.attr="disabled">
                                    Editar Artigo
                                </x-jet-secondary-button>
                            </div>
                            <div class="btn-mystuff-single">
                                <form action="/articles/delete/{{ $article->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-jet-danger-button type="submit" wire:loading.attr="disabled">
                                        {{ __('Remover Artigo') }}
                                    </x-jet-danger-button>
                                </form>
                            </div>
                        </div>
                        @endif
                        <x-jet-section-border />

                    @endforeach
                    <x-jet-dialog-modal wire:model="editModal">
                        <x-slot name="title">
                            {{ __('Editar Artigo') }}
                        </x-slot>
            
                        <x-slot name="content">
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                        @foreach($listArticles as $article)
                                        @if(auth()->user()->id == $article->user_id && $article->id == $selectedId)
                                        <div class="conteudo">
                                            <form class="form-body" action="/articles/update/{{ $article->id }}" method="POST" autocomplete="off">
                                                @csrf
                                                @method ('PUT')
                                                <label for="">Título</label>
                                                <input type="text" name="title" id="title" placeholder="Min. 3 caracteres..." value="{{ $article->title }}" minlength="3" maxlength="70">
                                                <label for="">Resumo do Artigo</label>
                                                <input type="text" name="resume" id="resume" placeholder="Min. 10 caracteres..." value="{{ $article->resume }}" minlength="10" maxlength="100">
                                                <label for="">Texto</label>
                                                <textarea name="text" id="text" cols="30" rows="10" placeholder="Max. 250 caracteres..." maxlength="250">{{ $article->text }}</textarea>
                                        
                                                <x-jet-button class="btn" type="submit">
                                                    {{ __('Criar Novo Artigo') }}
                                                </x-jet-button>
                                            </form>
                                        </div>
                                        @endif
                                        @endforeach
                            
                                    </div>
                                </div>
                            </div>
                        </x-slot>
            
                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="hideModal" wire:loading.attr="disabled">
                                {{ __('Cancelar') }}
                            </x-jet-secondary-button>
                        </x-slot>
                    </x-jet-dialog-modal>
                        @if(count($articles) == 0 && $search)
                        <h3><strong>Não há artigos disponíveis com a busca.</strong></h3>
                        <p><a href="/articles/my-articles" style="text-decoration: underline; color: #3E6D9C;">Ver todos os seus artigos</a></p>
                        @elseif($search)
                        <p><a href="/articles/my-articles" style="text-decoration: underline; color: #3E6D9C;">Ver todos os seus artigos</a></p>
                        @endif
                    @else 
                        <p>Você não possui artigos.</p>
                        <p><a href="/articles/create" style="text-decoration: underline; color: #3E6D9C;">Crie um agora</a></p>
                    @endif
                </div>
            
                <div>
                    {{  $articles->links()->with($search) }}
                </div>
            
            </div>
        </div>
    </div>
</div>
