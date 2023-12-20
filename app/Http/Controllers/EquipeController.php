<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index() {
        $equipe= [
            'nomEquipe'=>"Les chevaliers de la <table>",
            'logo'=>"/public/images/logo.jpg",
            'slogan'=>"cmd coder/manger/dormir",
            'localisation'=>"12E",
            'membres'=> [
                [ 'nom'=>"Biet",'prenom'=>"Lou-Anne", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur", "designer", "dragon"] ],
                [ 'nom'=>"Delmote",'prenom'=>"Axel", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur", "designer"] ],
                [ 'nom'=>"Machu",'prenom'=>"Killian", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur", "designer"] ],
                [ 'nom'=>"Barlet",'prenom'=>"Ethan", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur", "designer", "raptor"] ],
                [ 'nom'=>"Quehen",'prenom'=>"Timéo", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur", "pikachu"] ],
                [ 'nom'=>"Langagne",'prenom'=>"Jules", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur"] ],
                [ 'nom'=>"Mouton",'prenom'=>"Thomas", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur"] ],
                [ 'nom'=>"Lapôtre",'prenom'=>"Nicolas", 'image'=>"nomFichier", 'fonctions'=>["validateur","développeur", "concepteur"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipe' => $equipe]);
    }
}
