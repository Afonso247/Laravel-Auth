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
    

    public $message = 'Testando...';

    public function render()
    {
        $articles = Article::with('user')->paginate(2);
        $users = User::all();

        return view('livewire.show-articles', [
            'articles' => $articles,
            'users' => $users
        ]);
    }
}
