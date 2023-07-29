<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    //Visualizzazione del form di aggiunta articoli
    public function create () {

        return view('articles.create');

    }

    //Aggiunta di un articolo
    public function store (StoreArticleRequest $request) {

        $imageId = uniqid();

        $article = new Article;

        $article->title = $request->titolo;
        $article->content = $request->contenuto;

        if ($request->file('immagine')) {

            $article->image = 'image-article-' . $imageId . '.' . $request->file('immagine')->extension();
            $article->image_id = $imageId;
            $fileName = 'image-article-' . $imageId . '.' . $request->file('immagine')->extension();
            $image = $request->file('immagine')->storeAs('public', $fileName);

        } else {

            $article->image = '';
            $article->image_id = '';

        }

        $article->save();

        return redirect()->route('home');

    }
}
