<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Article,
    User
};

class CreateNewArticle extends Component
{

    public $title = '';
    public $resume = '';
    public $text = '';
    public $slug = '';

    public function render()
    {
        return view('livewire.create-new-article');
    }

    public function create() {

        if($this->title == '' || 
           $this->resume == '' || 
           $this->text == '' || 
           $this->slug == '') {
            
            dd('Eu não irei rodar.');
           } else {

            Article::create([
                'title' => $this->title,
                'resume' => $this->resume,
                'text' => $this->text,
                'slug' => $this->slug,
                'user_id' => 1
            ]);
           }

    }
}
