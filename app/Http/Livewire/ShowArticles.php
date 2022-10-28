<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Article,
    User
};

class ShowArticles extends Component
{

    public $message = 'Testando...';

    public function render()
    {
        $articles = Article::with('user')->get();
        $users = User::all();

        return view('livewire.show-articles', [
            'articles' => $articles,
            'users' => $users
        ]);
    }
}
