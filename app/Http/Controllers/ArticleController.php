<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Image;
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

        $tags = Tag::all();

        return view('articles.create',[

            'tags' => $tags

        ]);

    }

    //Aggiunta di un articolo
    public function store (StoreArticleRequest $request) {

        $article = new Article;

        $article->title = $request->titolo;
        $article->content = $request->contenuto;

        $article->user_id = auth()->user()->id;

        $article->save();

        if ($request->file('immagine')) {

            $images = $request->file('immagine');

            $images_columns = [];

            foreach ( $images as $image ) {

                $imageId = uniqid();

                $fileName = 'image-article-' . $imageId . '.' . $image->extension();

                $images_columns[] = ['file_name' => $fileName, 'file_id' => $image_id, 'article_id' => $article->id];

                Image::insert( 

                    $images_columns
    
                );

                $image = $image->storeAs('public', $fileName);

            }

        }

        $tags = $request->tag;

        foreach ($tags as $tag) {

            $currentArticle = Article::find($article->id);

            $currentArticle->tags()->attach($tag);

        }

        return redirect()->route('home');

    }

    //Mostra il form di modifica articolo
    public function edit ($id) {

        $article = Article::find($id);

        $tags = Tag::all();

        if ( auth()->user()->id == $article->user_id ) {

            return view('articles.edit', [

                'article' => $article,
                'tags' => $tags

            ]);

        } else {

            return redirect()->route('home');

        }

    }

    //Aggiorno l'articolo nel database
    public function update (Request $request, $id) {

        $article = Article::find($id);

        if ( auth()->user()->id == $article->user_id ) {

            $article->title = $request->titolo;
            $article->content = $request->contenuto;

            $article->save();

            if ($request->file('immagine')) {

                $images = $request->file('immagine');
    
                foreach ( $images as $image ) {
    
                    $imageId = uniqid();
    
                    $fileName = 'image-article-' . $imageId . '.' . $image->extension();
    
                    $article_image = new Image;
    
                    $article_image->file_name = $fileName;
                    $article_image->file_id = $imageId;
                    $article_image->article_id = $article->id;
    
                    $article_image->save();
    
                    $image = $image->storeAs('public', $fileName);
    
                }
    
            }

            $tags = $request->tag;

            $currentArticle = Article::find($article->id);

            $currentArticle->tags()->detach();

            foreach ($tags as $tag) {

                $currentArticle->tags()->attach($tag);

            }

            return redirect()->route('articles.edit', $id);

        } else {

            return redirect()->route('home');

        }

    }

    public function destroy ($id) {

        $article = Article::find($id);

        $article->delete();

        return redirect()->route('articles.index');

    }
}
