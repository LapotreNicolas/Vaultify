<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class HistoireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        if (!isset($cat)) {
            if (!isset($value)) {
                $histoire = Histoire::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $histoire = Histoire::where('titre', $value)->get();
                $cat = $value;

                Cookie::queue('cat', $cat, 10);            }
        } else {
            if ($cat == 'All') {
                $histoire = Histoire::all();
                Cookie::expire('cat');
            } else {
                $histoire = Histoire::where('titre', $cat)->get();
                Cookie::queue('cat', $cat, 10);
            }
        }
        $genre = Histoire::distinct('titre')->pluck('titre');
        return view('history.indexHistory',['titre' => "Liste des histoires", 'histoires' => $histoire, 'cat' => $cat, 'genreFiltres' => $genre]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('history.createHistory', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $this->validate(
                $request,
                [
                    'titre' => 'required',
                    'pitch' => 'required',
                    'active' => 'required',
                    'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'genre_id' =>' required',
                ]
            );

            // A partir d'ici le code est exécuté uniquement si les données sont validaées
            // par la méthode validate()
            // sinon un message d'erreur est renvoyé vers l'utilisateur

            // préparation de l'enregistrement à stocker dans la base de données
            $histoire = new Histoire();

            $histoire->titre = $request->titre;
            $histoire->pitch = $request->pitch;
            $histoire->active = $request->active;
            $photo = $request->file('photo')->store('images', 'public');
            $histoire->photo = $photo;
            $histoire->user_id = Auth::id();
            $histoire->genre_id = $request->input('genre_id');

            // insertion de l'enregistrement dans la base de données
            $histoire->save();

            // redirection vers la page qui affiche la liste des tâches
            return redirect()->route('history.index')
                ->with('type', 'primary')
                ->with('msg', 'Scene ajoutée avec succès');
        }
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
