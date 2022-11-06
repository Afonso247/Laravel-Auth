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
        $articleId = Article::latest()->get('id');
        $users = User::all();

        return view('livewire.my-articles', [
            'articles' => $articles,
            'articleId' => $articleId,
            'users' => $users,
            'counter' => $counter
        ]);
    }

    public function delete($id) {

        Article::findOrFail($id)->delete();

        return redirect('/articles/my-articles')->with('msg', 'Artigo removido com sucesso!');

    }

    public function showModal($id) {
        $this->editModal = true;

        // $this->artigo = $id;
        session(['selectedId' => $id]);
    }

    public function hideModal() {
        $this->editModal = false;

        session()->forget(['selectedId']);
    }
    
}
