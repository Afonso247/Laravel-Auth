<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Article;

class EditArticle extends Component
{

    public $title = '';
    public $resume = '';
    public $text = '';

    protected $rules = [
        'title' => 'required|min:30|max:70|unique:articles',
        'resume' => 'required|min:50|max:100',
        'text' => 'required|max:200'
    ];

    public function render($id)
    {

        $article = Article::findOrFail($id);

        return view('livewire.edit-article', [
            'article' => $article
        ]);
    }

    public function edit($id) {

        $this->validate();

        Article::findOrFail($id)->update([
            'title' => $this->title,
            'resume' => $this->resume,
            'text' => $this->text,
            'slug' => Str::slug($this->title, '-'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/articles/my-articles')->with('msg', 'Artigo editado com sucesso!');

    }
}
