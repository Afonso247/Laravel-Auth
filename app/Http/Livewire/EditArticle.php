<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;

class EditArticle extends ModalComponent
{

    public function render()
    {

        $listArticles = Article::all();

        // dd($listArticles);

        return view('livewire.edit-article', [
            'listArticles' => $listArticles
        ]);
    }

    public function edit($id, Request $request) {

        $checkArticles = Article::where('title', $request->title)->get();

        $editArticle = Article::findOrFail($id);

        // Verificação de título único
        if($request->title != $editArticle->title){
            foreach($checkArticles as $checkArticle) {
                if($checkArticle->title == $request->title) {

                    return redirect('/articles/my-articles')->with('err', 'O título inserido deve ser único!');
                }
            }

            // placeholder
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

            // placeholder
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
