<?php

namespace App\Http\Controllers;

use App\Models\Avis;
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
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'pitch' => 'required',
                'genre_id' =>' required',
            ]
        );

        $photo = $request->get('photo');
        if (!isset($photo)) $photo = '/images/bit-1.webp';

        $histoire = new Histoire();

        $histoire->titre = $request->titre;
        $histoire->pitch = $request->pitch;
        $histoire->active = 0;
        $histoire->photo = $photo;
        $histoire->user_id = Auth::id();
        $histoire->genre_id = $request->input('genre_id');

        $histoire->save();

        return redirect()->route('createChapitre', ['id' => $histoire->id]);
    }

    public function createChapitre($id)
    {
        $histoire = Histoire::find($id);
        return view('chapter.createChapitre', ['histoire' => $histoire]);
    }

    public function storeChapitre(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'titrecourt' => 'required',
                'texte' => 'required',
            ]
        );

        $chapitre = new Chapitre();
        if (isset($request->titre)) $chapitre->titre = $request->titre;
        $chapitre->titrecourt = $request->titrecourt;
        $chapitre->texte = $request->texte;
        if (isset($request->question)) $chapitre->question = $request->question;
        if (isset($request->premier)) $chapitre->premier = 1;
        else $chapitre->premier = 0;
        if (isset($request->media)) $chapitre->media = $request->media;
        $chapitre->histoire_id = $id;

        $chapitre->save();

        $histoire = Histoire::find($id);
        return redirect()->route('createChapitre', ['id' => $histoire->id]);
    }

    public function lienChapitre(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'id_src' => 'required',
                'id_dest' => 'required',
                'reponse' => 'required',
            ]
        );

        $id_src = $request->id_src;
        $id_dest = $request->id_dest;

        $src = Chapitre::find($id_src);
        // $dest = Chapitre::find($id_dest);

        $src->suivants()->attach($id_dest, ['reponse' => $request->reponse]);

        $histoire = Histoire::find($id);

        return redirect()->route('createChapitre', ['id' => $histoire->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $histoire = Histoire::find($id);
        $commentaires = $histoire->avis;
        $terminer = $histoire->terminees()->sum("nombre");
        $avis = $histoire->avis()->sum("histoire_id");
        $titre = $request->get('action', 'show') == 'show' ? "Détails d'une tâche" : "Suppression d'une tâche";
        return view('story.showHistory', ['titre' => $titre, 'histoire' => $histoire, 'commentaires' => $commentaires, 'terminer' => $terminer, 'avis' => $avis,
            'action' => $request->get('action', 'show'), 'id_chapitre'=> $histoire->premier()->id]);
    }


    // Gestion des Chapitres

    public function showChapter(Request $request, $chapter_id)
    {
        $ariane = $request->get('ariane',default: []);
        $chapitre = Chapitre::find($chapter_id);
        $suivants = $chapitre->suivants;
        $ariane[$chapter_id] = $chapitre->titrecourt;
        return view('chapter.showChapter', ['chapter' => $chapitre, 'suivants' => $suivants, 'ariane' => $ariane]);
    }

    function storeAvis(Request $request)
    {
        $this->validate(
            $request,
            [
                'contenu' => 'required',
            ]
        );

        $contenu = $request->get('contenu');
        $user_id = Auth::id();
        $histoire_id = $request->get('h_id');
        $avis = Avis::create(['contenu' => $contenu, 'user_id' => $user_id, 'histoire_id' => $histoire_id]);

        return redirect()->route('story.show', ['story' => $request->get('h_id')]);
    }

    public function changeActive(Request $request)
    {
        $id = $request->get('id');
        $histoire = Histoire::find($id);
        $histoire->active = ($histoire->active+1)%2;
        $histoire->save();

        return redirect()->route('profil');
    }

    function accueil()
    {
        $histoires = Histoire::inRandomOrder()->take(3)->get();
        return view('accueil',['titre' => 'Accueil','histoires' => $histoires]);
    }
}
