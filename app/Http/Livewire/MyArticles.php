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

    public $article;
    public $editModal = false;
    public $selectedId;

    use WithPagination;

    public function render()
    {

        $counter = 0;
        $listArticles = Article::all();

        foreach (Article::all() as $article){
            if($article->user_id == auth()->user()->id){
                $counter++;
            }
        }

        $articles = Article::with('user')->latest()->paginate();
        $articleId = Article::latest()->get('id');
        $users = User::all();

        return view('livewire.my-articles', [
            'listArticles' => $listArticles,
            'articles' => $articles,
            'articleId' => $articleId,
            'selectedId' => $this->selectedId,
            'users' => $users,
            'counter' => $counter
        ]);
    }

    public function delete($id) {

        Article::findOrFail($id)->delete();

        return redirect('/articles/my-articles')->with('msg', 'Artigo removido com sucesso!');

    }

    public function showModal($id) {
        $this->selectedId = $id;

        $this->editModal = true;
    }

    public function hideModal() {
        $this->editModal = false;

        session()->forget(['selectedId']);
    }
    
}
