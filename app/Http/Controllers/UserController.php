<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //Mostro la vista profilo
    public function index () {

        return view('users.profile');

    }
}
