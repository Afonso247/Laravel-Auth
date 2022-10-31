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

        $articles = Article::with('user')->latest()->paginate();
        $users = User::all();

        return view('livewire.my-articles', [
            'articles' => $articles,
            'users' => $users
        ]);
    }
}
