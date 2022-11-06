<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;

class EditArticle extends Component
{

    public $articleId;

    public $currentId;

    // protected $rules = [
    //     'editTitle' => 'required|min:30|max:70|unique:articles',
    //     'editResume' => 'required|min:50|max:100',
    //     'editText' => 'required|max:200'
    // ];

    public function render()
    {

        $listArticles = Article::all();

        // dd($listArticles);

        return view('livewire.edit-article', [
            'listArticles' => $listArticles
            // 'title' => $this->editTitle,
            // 'resume' => $this->editResume,
            // 'text' => $this->editText
        ]);
    }

    public function mount() {
        $this->currentId = session('selectedId');
    }

    public function edit($id, Request $request) {

        $checkArticles = Article::where('title', $request->title)->get();

        $editArticle = Article::findOrFail($id);

        if($request->title != $editArticle->title){
            foreach($checkArticles as $checkArticle) {
                if($checkArticle->title == $request->title) {

                    return redirect('/articles/my-articles')->with('err', 'O título inserido deve ser único!');
                }
            }

            // $this->article->title = 'lorem Ipsum is incorrect password reset link that will allow you.';
            // $this->article->resume = 'lorempixel is incorrect password reset link link that will allow you to reset your password again with a new password reset lololollolollololol';
            // $this->article->text = 'Um texto';
            // $this->article->slug = Str::slug($this->article->title, '-');

            $editArticle->title = $request->title;
            $editArticle->resume = $request->resume;
            $editArticle->text = $request->text;
            $editArticle->slug = Str::slug($request->title, '-');
            $editArticle->user_id = auth()->user()->id;

            $editArticle->update();


            return redirect('/articles/my-articles')->with('msg', 'Artigo editado com sucesso!');
        } else {

            // $this->article->title = 'lorem Ipsum is incorrect password reset link that will allow you.';
            // $this->article->resume = 'lorempixel is incorrect password reset link link that will allow you to reset your password again with a new password reset lololollolollololol';
            // $this->article->text = 'Um texto';
            // $this->article->slug = Str::slug($this->article->title, '-');

            $editArticle->title = $request->title;
            $editArticle->resume = $request->resume;
            $editArticle->text = $request->text;
            $editArticle->slug = Str::slug($request->title, '-');
            $editArticle->user_id = auth()->user()->id;

            $editArticle->update();


            return redirect('/articles/my-articles')->with('msg', 'Artigo editado com sucesso!');
        }

    }
}
