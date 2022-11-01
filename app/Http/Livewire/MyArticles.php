<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Article,
    User
};
use Livewire\WithPagination;

class MyArticles extends Component
{

    use WithPagination;

    public function render()
    {

        $counter = 0;

        foreach (Article::all() as $article){
            if($article->user_id == auth()->user()->id){
                $counter++;
            }
        }

        $articles = Article::with('user')->latest()->paginate();
        $users = User::all();

        return view('livewire.my-articles', [
            'articles' => $articles,
            'users' => $users,
            'counter' => $counter
        ]);
    }

    public function delete($id) {

        Article::findOrFail($id)->delete();

        return redirect('/articles/my-articles')->with('msg', 'Artigo removido com sucesso!');

    }
}
