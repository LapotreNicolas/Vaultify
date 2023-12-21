<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function show(Request $requete, $id)
    {
        $user = User::find($id);
        $finies = $user->terminees()->sum("nombre");
        $creees = Histoire::all()->where('user_id', $id);
        return view('users.showUser', [ 'user' => $user, 'finies' => $finies, 'creees' => $creees]);
    }

    function profil()
    {
        $histoires = Histoire::all()->where('user_id', Auth::id())->sortBy('active');
        return view('profil', ['histoires' => $histoires]);
    }

    public function upload(Request $request) {

        $user = Auth::user();

        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $file = $request->file('document');
        } else {
            return redirect()->route('home');
        }
        $nom = 'avatar';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images',$nom);
        if (isset($user->avatar)) {
            Log::info("Image supprimée : ". $user->avatar);
            Storage::delete($user->avatar);
        }
        $user->avatar = $nom;
        $user->save();
        //$file->store('docs');
        return redirect()->route('profil');
    }
}
