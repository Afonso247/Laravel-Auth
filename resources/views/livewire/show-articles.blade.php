<div>
    <h2>Mostrando últimos artigos: </h2>


    <hr>

    
    <div>
        @foreach ($articles as $article)
            
            <h3><strong>{{ $article->title }}</strong></h3>
            <h4><i>{{ $article->resume }}</i></h4>
            <p>{{ $article->text }}</p>
            <hr>
        @endforeach
    </div>

    <hr>

    <div>
        {{ $articles->links() }}
    </div>
</div>