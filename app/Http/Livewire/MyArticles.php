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

        $search = request('search');

        $counter = 0;
        $counterSearch = 0;
        $listArticles = Article::all();

        foreach (Article::all() as $article){
            if($article->user_id == auth()->user()->id){
                $counter++;
            }
        }

        if($search) {

            foreach (Article::where('title', 'like', '%'.$search.'%') 
                as $article)
            {
                if($article->user_id == auth()->user()->id){
                    $counterSearch++;
                }
            }

            $articles = Article::where([
                ['user_id', auth()->user()->id],
                ['title', 'like', '%'.$search.'%']
            ])->latest()->paginate(2);
        } else {
            $articles = Article::where(
                'user_id', auth()->user()->id)
                ->latest()->paginate(2);
        }

        $articleId = Article::latest()->get('id');
        $users = User::all();

        return view('livewire.my-articles', [
            'listArticles' => $listArticles,
            'articles' => $articles,
            'articleId' => $articleId,
            'selectedId' => $this->selectedId,
            'users' => $users,
            'counter' => $counter,
            'counterSearch' => $counterSearch,
            'search' => $search
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
