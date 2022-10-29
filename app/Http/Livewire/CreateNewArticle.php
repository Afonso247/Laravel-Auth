<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\{
    Article,
    User
};

class CreateNewArticle extends Component
{

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
        return view('livewire.create-new-article');
    }

    public function create() {

        $this->validate();

        auth()->user()->articles()->create([
            'title' => $this->title,
            'resume' => $this->resume,
            'text' => $this->text,
            'slug' => Str::slug($this->title, '-'),
            'user_id' => auth()->user()->id
        ]);

        // Article::create([
        //     'title' => $this->title,
        //     'resume' => $this->resume,
        //     'text' => $this->text,
        //     'slug' => Str::slug($this->title, '-'),
        //     'user_id' => auth()->user()->id
        // ]);

        return redirect('/articles')->with('msg', 'Artigo criado com sucesso!');

    }
}
