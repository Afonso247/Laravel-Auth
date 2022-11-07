{{-- @section('web-title', 'Editando artigo...') --}}
{{-- Arquivo inútil. Mas tô deixando aqui só por precaução ;) --}}


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @foreach($listArticles as $article)
            @if(auth()->user()->id == $article->user_id && $article->id == session('selectedId'))
            <form action="/articles/update/{{ $article->id }}" method="POST">
                @csrf
                @method ('PUT')
                <label for="">Título</label>
                <input type="text" name="title" id="title" placeholder="Min. 30 caracteres..." value="{{ $article->title }}" minlength="30" maxlength="70">
                <label for="">Resumo do Artigo</label>
                <input type="text" name="resume" id="resume" placeholder="Min. 50 caracteres..." value="{{ $article->resume }}" minlength="50" maxlength="100">
                <label for="">Texto</label>
                <textarea name="text" id="text" cols="50" rows="20" placeholder="Max. 200 caracteres..." maxlength="200">{{ $article->text }}</textarea>
        
                <x-jet-button type="submit">
                    {{ __('Criar Novo Artigo') }}
                </x-jet-button>
            </form>
            @endif
            @endforeach

            @error('editTitle')
            <p>O campo "Título" não foi devidamente preenchido.</p>
            <small>(Min. 30 caracteres | Max. 70 caracteres)</small>
            <small>- O título não pode ser igual a de outros artigos</small>
            @enderror
            @error('editResume')
            <p>O campo "Resumo do Artigo" não foi devidamente preenchido.</p>
            <small>(Min. 50 caracteres | Max. 100 caracteres)</small>
            @enderror
            @error('editText')
            <p>O campo "Texto" não foi devidamente preenchido.</p>
            <small>(Max. 200 caracteres)</small>
            @enderror
        </div>
    </div>
</div>
