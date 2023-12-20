<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;
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
