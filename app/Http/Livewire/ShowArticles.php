<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;

class ShowArticles extends Component
{

    public $message = 'Testando...';

    public function render()
    {
        $articles = Article::with('user')->get();

        return view('livewire.show-articles', [
            'articles' => $articles
        ]);
    }
}
