<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Mostro la vista profilo
    public function index () {

        return view('users.profile');

    }

    //Mando alla vista i relativi articoli dell'utente loggato
    public function articles () {

        $user_articles = User::find(auth()->user()->id);

        return view('users.articles', [

            'user_articles' => $user_articles->articles

        ]);

    }
}
