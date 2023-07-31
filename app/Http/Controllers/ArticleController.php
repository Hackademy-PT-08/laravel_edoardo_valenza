<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{

    //Visualizzazione di tutti gli articoli
    public function index () {

        $articles = Article::all();

        return view('articles.index', [

            'articles' => $articles

        ]);

    }

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

    //Mostra il form di modifica articolo
    public function edit ($id) {

        $article = Article::find($id);

        return view('articles.edit', [

            'article' => $article

        ]);

    }

    //Aggiorno l'articolo nel database
    public function update (Request $request, $id) {

        $article = Article::find($id);

        $article->title = $request->titolo;
        $article->content = $request->contenuto;

        if ($request->file('immagine')) {

            if ( $article->image_id !== '' ) {

                $imageId = $article->image_id;

            } else {

                $imageId = uniqid();

            }

            $article->image = 'image-article-' . $imageId . '.' . $request->file('immagine')->extension();
            $article->image_id = $imageId;
            $fileName = 'image-article-' . $imageId . '.' . $request->file('immagine')->extension();
            $image = $request->file('immagine')->storeAs('public', $fileName);

        }

        $article->save();

        return redirect()->route('articles.edit', $id);

    }

    public function destroy ($id) {

        $article = Article::find($id);

        $article->delete();

        return redirect()->route('articles.index');

    }
}
