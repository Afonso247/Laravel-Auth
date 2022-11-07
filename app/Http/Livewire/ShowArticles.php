<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{
    Article,
    User
};

class ShowArticles extends Component
{
    use WithPagination;
    


    public function render()
    {
        
        $search = request('search');

        if($search){

            $users = User::all();
            $articles = Article::with('user')->where([
                ['title', 'like', '%'.$search.'%'],
            ])->latest()->paginate(3);
        } else {

            $articles = Article::with('user')->latest()->paginate(3);
            $users = User::all();
        }

        return view('livewire.show-articles', [
            'articles' => $articles,
            'users' => $users,
            'search' => $search
        ]);
    }

}
