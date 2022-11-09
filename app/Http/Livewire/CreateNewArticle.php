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
        'title' => 'required|min:3|max:70|unique:articles',
        'resume' => 'required|min:10|max:100',
        'text' => 'required|max:250'
    ];

    public function render()
    {
        return view('livewire.create-new-article');
    }

    public function create() {

        $this->validate();

        // Ignore o erro. O código funciona da mesma forma.
        auth()->user()->articles()->create([
            'title' => $this->title,
            'resume' => $this->resume,
            'text' => $this->text,
            'slug' => Str::slug($this->title, '-'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/dashboard')->with('msg', 'Artigo criado com sucesso!');

    }
}
