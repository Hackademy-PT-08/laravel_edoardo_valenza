<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //Visualizzazione del form di aggiunta articoli
    public function create () {

        return view('articles.create');

    }

    //Aggiunta di un articolo
    public function store (Request $request) {

        $article = new Article;

        $article->title = $request->titolo;
        $article->content = $request->contenuto;

        $article->save();

        return redirect('/');

    }
}
