<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('story.indexHistory',['titre' => "Liste des histoires", 'histoires' => $histoire, 'genre' => $nom_genre, 'genres_possibles' => $genre_possibles]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('story.createHistory', ['genres' => $genres]);
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
            return redirect()->route('story.index')
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
            'action' => $request->get('action', 'show'), 'id_chapitre'=> $histoire->premier()->id]);
    }


    // Gestion des Chapitres

    public function showChapter(Request $request, $id, $chapter_id)
    {
        $chapitre = Chapitre::find($chapter_id);
        $suivants = $chapitre->suivants;
        return view('chapter.showChapter', ['chapter' => $chapitre, 'suivants' => $suivants]);
    }

}
