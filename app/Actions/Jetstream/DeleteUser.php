<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;
use App\Models\Article;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $hasArticles = false;
        $allArticles = Article::all();

        foreach ($allArticles as $article){
            if($article->user->id == $user->id){
                $hasArticles = true;
            }
        }

        if($hasArticles == true){
            dd('Esta conta não pode ser removida pois possui um artigo ou mais registrado.');
        } else {
            $user->deleteProfilePhoto();
            $user->tokens->each->delete();
            $user->delete();
        }
        
    }
}
