<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;
use App\Models\Article;

class EditArticle extends Component
{

    public $articleId;
    // public $article = Article::findOrFail($articleId);

    public $title = '';
    public $resume = '';
    public $text = '';

    protected $rules = [
        'title' => 'required|min:30|max:70|unique:articles',
        'resume' => 'required|min:50|max:100',
        'text' => 'required|max:200'
    ];

    public function render()
    {

        // $this->title = $this->article->title;
        // $this->resume = $this->article->resume;
        // $this->text = $this->article->text;

        // $this->article->title = $this->title;
        // $this->article->resume = $this->resume;
        // $this->article->text = $this->text;

        $article = $this->articleId;

        return view('livewire.edit-article', [
            'article' => $article
        ]);
    }

    // public function mount() {
    //     $this->title = $this->getArticle->title;
    //     $this->resume = $this->getArticle->resume;
    //     $this->text = $this->getArticle->text;
    // }

    public function edit($id) {

        $this->validate();

        // $this->article->title = 'lorem Ipsum is incorrect password reset link that will allow you.';
        // $this->article->resume = 'lorempixel is incorrect password reset link link that will allow you to reset your password again with a new password reset lololollolollololol';
        // $this->article->text = 'Um texto';
        // $this->article->slug = Str::slug($this->article->title, '-');

        $newArticle = Article::findOrFail($id);

        $newArticle->title = $this->article->title;
        $newArticle->resume = $this->article->resume;
        $newArticle->text = $this->article->text;
        $newArticle->slug = Str::slug($this->article->title, '-');
        $newArticle->user_id = auth()->user()->id;

        $newArticle->update();


        return redirect('/articles/my-articles')->with('msg', 'Artigo editado com sucesso!');

    }
}
