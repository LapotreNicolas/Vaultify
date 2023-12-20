<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function accueil()
    {
        return view('accueil', ['titre' => 'le titre']);
    }

    public function apropos()
    {
        return view('apropos', ['titre' => "A Propos"]);

    }

    public function profil()
    {

    }
}