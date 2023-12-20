<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HistoireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $nom_genre = null)
    {

        $nom_genre = $request->get('nom_genre');
        $remember = $request->cookie('nom_genre', null);

        if (!isset($nom_genre)) {

            if (!isset($remember)) {
                $histoire = Histoire::all();
                $nom_genre = 'All';
                Cookie::expire('nom_genre');
            } else {
                $genre = Genre::where('label',$remember)->get()[0]['id'];
                $histoire = Histoire::where('genre_id', $genre)->get();
                $nom_genre = $remember;

                Cookie::queue('nom_genre', $nom_genre, 10);            }
        } else {

            if ($nom_genre == 'All') {
                $histoire = Histoire::all();
                Cookie::expire('nom_genre');
            } else {
                $genre = Genre::where('label',$nom_genre)->get()[0]['id'];
                $histoire = Histoire::where('genre_id', $genre)->get();
                Cookie::queue('nom_genre', $nom_genre, 10);
            }
        }
        $genre_possibles = Genre::distinct('label')->pluck('label');
        return view('history.indexHistory',['titre' => "Liste des histoires", 'histoires' => $histoire, 'genre' => $nom_genre, 'genres_possibles' => $genre_possibles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $histoire = Histoire::find($id);
        $titre = $request->get('action', 'show') == 'show' ? "Détails d'une tâche" : "Suppression d'une tâche";
        return view('history.showHistory', ['titre' => $titre, 'histoire' => $histoire,
            'action' => $request->get('action', 'show')]);
    }

}
