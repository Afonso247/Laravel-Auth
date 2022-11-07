<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    ShowArticles,
    CreateNewArticle,
    MyArticles,
    EditArticle
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/articles/create', 
        CreateNewArticle::class)->name('article-create');

    Route::get('/articles/my-articles', 
        MyArticles::class)->name('my-articles');

    Route::delete('/articles/delete/{id}', 
        [MyArticles::class, 'delete']);

    Route::put('/articles/update/{id}', 
        [EditArticle::class, 'edit']);
});
